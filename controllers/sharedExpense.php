<?php

protectPage();
$userID = $_SESSION['userid'];

//lists all of the groups of the current user
$groups = $db->query("select clan.* from clanMembers join clan ON clanMembers.groupID=clan.groupID WHERE clanMembers.userID=?;", [$userID])->fetchAll(PDO::FETCH_ASSOC);

//when a group is created
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['groupName'])) {
    $groupName = $_POST['groupName'];
    $targetFilePath = 'assets/icons/group/_default.png'; //sets default group icon (if no file uploaded)
    $fileSuccess = true;

    // if a file is uploaded
    if (isset($_FILES['groupIcon']) && $_FILES['groupIcon']['error'] === UPLOAD_ERR_OK) {
        $fileSuccess = false;
        $groupIconFile = $_FILES['groupIcon'];
        $groupIconName = basename($groupIconFile['name']);

        $fileType = strtolower(pathinfo($groupIconName, PATHINFO_EXTENSION));
        $allowedTypes = ['png', 'jpg', 'jpeg'];

        //checks file is appropriate
        if (in_array($fileType, $allowedTypes)) {
            // //gets current user's pfp
            // $userInfo = $db->query("SELECT userIcon FROM users WHERE userid = :userid", [':userid' => $userID])->fetch(PDO::FETCH_ASSOC);
            // $currentIconPath = $userInfo['userIcon'];

            // // delete current user's pfp if it exist
            // if (!empty($currentIconPath) && file_exists($currentIconPath)) {
            //     unlink($currentIconPath);
            // }

            //prepares the uploaded icon's path
            $targetDir = "assets/icons/group/";
            $uniqueFileName = uniqid('group_', true) . '.' . $fileType;
            $targetFilePath = $targetDir . $uniqueFileName;

            //uploads the file into the target dir. Errors if not uploaded
            if (moveResizedImage($groupIconFile, $targetFilePath)) {
                $fileSuccess = true;
            } else {
                $message = "Error uploading file.";
            }
        } else {
            $message = "Invalid file type. Only PNG, JPEG, and JPG are allowed.";
        }
    }

    //if file is processed successfully or no file is uploaded
    if ($fileSuccess) {
        try {
            //creates the group
            $db->query('INSERT INTO clan(groupName, groupOwnerID, groupIcon) VALUES (?,?,?);', [$groupName, $userID, $targetFilePath]);
            //gets the groupID of the group created by the current user
            $groupID = $db->query("select groupID from clan WHERE groupOwnerID=? ORDER BY groupID DESC LIMIT 1;", [$userID])->fetchColumn();
            //inserts the current user as member/owner of the group
            $db->query("INSERT INTO clanMembers (groupID, userID, roles) VALUES(?, ?, 'owner');", [$groupID, $userID]);
            redirect('/shared?groupID=' . $groupID);
        } catch (PDOException $e) {
            $message = "An error occurred while processing your request. Please try again later.";
        }
    }
}
//when a user does not have a group yet
else if (!isset($groups)) {
    require('views/sharedExpense.view.php');
    return;
}
//when share is visited w/o a specified groupID
else if ($_SERVER['REQUEST_METHOD'] === "GET" && !isset($_GET['groupID'])) {
    $groupID = $groups[0]['groupID']; //first result from the group list
    redirect('/shared?groupID=' . $groupID);
}
//when a particular group is visited
else if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['groupID'])) {
    $groupID = $_GET['groupID'];

    //search if the current user if a member of the group. If not, user will be redirected to the default group
    $valid = $db->query("SELECT * from clanMembers WHERE userID=? AND groupID=?", [$userID, $groupID])->fetch(PDO::FETCH_ASSOC);
    if ($valid) {
        $groupInfo = $db->query("SELECT * from clan WHERE groupID = ?", [$groupID])->fetch(PDO::FETCH_ASSOC);
        $groupName = $groupInfo['groupName'];
        $groupOwnerID = $groupInfo['groupOwnerID'];
        $groupIcon = $groupInfo['groupIcon'];
        $groupTokenHash = $groupInfo['groupTokenHash'];
        $groupTokenExpiry = $groupInfo['groupTokenExpiry'];
    } else {
        alertRedirect("Nuh uhh!", "/shared");
    }
}


require('views/sharedExpense.view.php');
