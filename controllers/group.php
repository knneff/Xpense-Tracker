<?php

protectPage();
$userID = $_SESSION['userid'];

//lists all of the groups of the current user
$groups = $db->query("select clan.* from clanMembers join clan ON clanMembers.groupID=clan.groupID WHERE clanMembers.userID=?;", [$userID])->fetchAll(PDO::FETCH_ASSOC);

//EVERYTHING POST RELATED
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //when a group is created
    if (isset($_POST['groupName'])) {
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
                redirect('/group?id=' . $groupID);
            } catch (PDOException $e) {
                $message = "An error occurred while processing your request. Please try again later.";
            }
        }
    }
    //when a user joins a group using invite token
    else if (isset($_POST['groupToken'])) {
        $inviteToken = $_POST['groupToken'];
        //if invite link is pasted here instead of just the token
        if (str_contains($inviteToken, 'invite?token=')) {
            $query = parse_url($inviteToken, PHP_URL_QUERY);
            parse_str($query, $params);
            $inviteToken = $params['token'];
        }
        redirect('/invite?token=' . $inviteToken);
    }
    //when a user adds a group expense
    else if (isset($_POST['type'])) {
        $category = $_POST['category'];
        $description = $_POST['desc'];
        $expenseType = $_POST['type'];
        $currentDateTime = new DateTime();
        $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');
        $groupID = $_GET['id'];
        $groupAllMembersInfo = $db->query("SELECT users.username, users.userIcon, users.userid, clanMembers.roles from clanMembers join users ON clanMembers.userID = users.userid WHERE clanMembers.groupID = ? ORDER BY username ASC;", [$groupID])->fetchAll(PDO::FETCH_ASSOC);

        foreach ($groupAllMembersInfo as $index => $memberInfo) {
            $userID = $memberInfo['userid'];
            $amountUserId = 'amount' . $userID;
            //if an amount is set to a particular user
            if (isset($_POST[$amountUserId])) {
                $amount = $_POST[$amountUserId];
                $sql = "INSERT INTO expenses (userID, amount, category, description, expenseType, expenseTime, groupID) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $params = [$userID, $amount, $category, $description, $expenseType, $currentDateTimeString, $groupID];
                $db->query($sql, $params);
            }
        }
        redirect('/group?id=' . $groupID);
    }
    //when a user deletes a group expense
    else if (isset($_POST['toDel'])) {
        $toDel = $_POST['toDel'];
        $db->query("DELETE FROM expenses WHERE expenseID = ?;", [$toDel]);
        redirect($_SERVER['REQUEST_URI']);
    }
}
//EVERYTHING GET RELATED
else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    // When a user does not have a group yet
    if (sizeof($groups) < 1) {
        require('views/group/noGroup.view.php');
        die();
    }
    // [DEFAULT GROUP] When share is visited w/o a specified groupID (E.g., localhost/group)
    if ($_SERVER['REQUEST_METHOD'] === "GET" && !isset($_GET['id'])) {
        $groupID = $groups[0]['groupID']; //first result from the group list (DEFAULT)
        redirect('/group?id=' . $groupID);
    }
    // When user specified a groupID (E.g., localhost/group?id=1)
    else if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $groupID = $_GET['id'];

        //search if the current user is a member of the group.
        $valid = $db->query("SELECT * from clanMembers WHERE userID=? AND groupID=?", [$userID, $groupID])->fetch(PDO::FETCH_ASSOC);
        if ($valid) {
            // stores information about the current group
            $groupInfo = $db->query("SELECT * from clan WHERE groupID = ?", [$groupID])->fetch(PDO::FETCH_ASSOC);
            $groupName = $groupInfo['groupName'];
            $groupOwnerID = $groupInfo['groupOwnerID'];
            $groupIcon = $groupInfo['groupIcon'];
            $groupTokenHash = $groupInfo['groupTokenHash'];
            $groupTokenExpiry = $groupInfo['groupTokenExpiry'];

            // [FOR MEMBER LIST & GROUP EXPENSE PANEL] 
            // lists all of the group's member (owner and admin included)
            $groupAllMembersInfo = $db->query("SELECT users.username, users.userIcon, users.userid, clanMembers.roles from clanMembers join users ON clanMembers.userID = users.userid WHERE clanMembers.groupID = ? ORDER BY username ASC;", [$groupID])->fetchAll(PDO::FETCH_ASSOC);
            $groupMembersInfo = array(); //stores list of all members (owner and admin not included)
            $groupMembersCount = 0; //stores member count in a group
            foreach ($groupAllMembersInfo as $index => $groupMemberInfo) {
                if ($groupMemberInfo['roles'] !== 'owner') {
                    $groupMembersCount++;
                    array_push($groupMembersInfo, $groupMemberInfo);
                } else {
                    $groupOwnerInfo = $groupMemberInfo; //stores information about the group owner
                }
            }

            // [FOR GROUP TRANSACTION]
            // stores information about group expenses
            $groupExpenses = $db->query('SELECT expenses.*, users.username, users.userIcon from expenses JOIN users ON expenses.userID=users.userid WHERE expenses.groupID=? ORDER BY expenseTime DESC;', [$groupID])->fetchAll(PDO::FETCH_ASSOC);
        }
        //If not a member, user will be redirected to the default group
        else {
            alertRedirect("Inaccessable Group!", "/group");
        }
    }
}



require('views/group/group.view.php');
