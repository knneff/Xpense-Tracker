<?php

protectPage();
$userID = $_SESSION['userid'];
$groups = $db->query("select clan.* from clanMembers join clan ON clanMembers.groupID=clan.groupID WHERE clanMembers.userID=?;", [$userID])->fetchAll(PDO::FETCH_ASSOC);

//when group is created
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
            redirect('/shared');
        } catch (PDOException $e) {
            $message = "An error occurred while processing your request. Please try again later.";
        }
    }
}

require('views/sharedExpense.view.php');
