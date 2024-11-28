<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
$userID = $_SESSION['userid'];
// Use $_SESSION['userid']; to get logged in user's userid

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     //     // dd($_FILES);
//     dd(isset($_FILES['groupIcon']), $_POST['groupName'], $_FILES['groupIcon']['error'] === UPLOAD_ERR_OK, $_FILES);
// }


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

// else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['groupName'])) {
//     $firstname = $_POST['firstName'];
//     $lastname = $_POST['lastName'];
//     $username = $_POST['username'];
//     $email = $_POST['email'];

//     $sql = "UPDATE users SET 
//             firstName = :firstname, 
//             lastName = :lastName, 
//             username = :username,  
//             email = :email
//             WHERE userid = :userid";

//     $params = [
//         ':firstname' => $firstname,
//         ':lastName' => $lastname,
//         ':email' => $email,
//         ':username' => $username,
//         ':userid' => $userID
//     ];

//     try {
//         $db->query($sql, $params);
//         header("Location: {$_SERVER['REQUEST_URI']}");
//         exit;
//     } catch (PDOException $e) {
//         $message = "An error occurred while processing your request. Please try again later.";
//     }
// }


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['groupName']) && false) {
    $groupName = $_POST['groupName'];
    $groupIcon = $_POST['iconUpload']; //stores name of the file that was uploaded
    dd($groupName, $groupIcon);
    $groupOwnerID = $_SESSION['userid'];
    if ($groupIcon == '') { //if no group icon is uploaded
        $groupIcon = 'assets/group/_default.png';
    } else { //if a group icon is uploaded
        $groupIcon = 'assets/group/' . $groupIcon;
    }

    //creates the group
    $db->query('INSERT INTO clan(groupName, groupOwnerID, groupIcon) VALUES (?,?,?);', [$groupName, $groupOwnerID, $groupIcon]);
    //gets the groupID of the group created by the current user
    $groupID = $db->query("select groupID from clan WHERE groupOwnerID=? ORDER BY groupID DESC LIMIT 1;", [$groupOwnerID])->fetchColumn();
    //inserts the current user as member/owner of the group
    $db->query("INSERT INTO clanMembers (groupID, userID, roles) VALUES(?, ?, 'owner');", [$groupID, $groupOwnerID]);
    redirect('/shared');
}

require('views/sharedExpense.view.php');
