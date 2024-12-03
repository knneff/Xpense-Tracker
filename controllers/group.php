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
    else if (isset($_POST['addGroupExpense'])) {
        $category = $_POST['category'];
        $description = $_POST['desc'];
        $expenseType = 'group';
        $currentDateTime = new DateTime();
        $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');
        $groupID = $_GET['id'];
        $expenseState = 'pending';

        //group info
        $groupAllMembersInfo = $db->query("SELECT users.username, users.userIcon, users.userid, clanMembers.roles from clanMembers join users ON clanMembers.userID = users.userid WHERE clanMembers.groupID = ? ORDER BY username ASC;", [$groupID])->fetchAll(PDO::FETCH_ASSOC);
        $groupInfo = $db->query("SELECT * from clan WHERE groupID = ?", [$groupID])->fetch(PDO::FETCH_ASSOC);
        $groupName = $groupInfo['groupName'];
        $groupIcon = $groupInfo['groupIcon'];

        foreach ($groupAllMembersInfo as $index => $memberInfo) {
            $userID = $memberInfo['userid'];
            $amountUserId = 'amount' . $userID;
            //if an amount is set to a particular user
            if (isset($_POST[$amountUserId])) {
                $amount = $_POST[$amountUserId];
                //inserts pending expense in expense history database
                $sql = "INSERT INTO expensesHistory (userID, amount, category, description, expenseType, expenseTime, groupID, expenseState) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $params = [$userID, $amount, $category, $description, $expenseType, $currentDateTimeString, $groupID, $expenseState];
                $db->query($sql, $params);
                //inserts notification to user database
                $title = "
                    <div class='flex flex-row justify-between font-semibold text-md pr-2'>
                        <p>Pending Expense!</p>
                        <a href='/group?id=$groupID'> <img class='size-6 rounded-3xl' src='$groupIcon'> </a>
                    </div>
                    <hr class='text-gray-600'>
                ";
                $body = "An amount of <b>$$amount</b> has been added to your pending expense in the group <u>$groupName</u>. Click <a class='textTeal hover:underline' href='/group?id=$groupID'>here</a> to see!";
                $sql = "INSERT INTO notification (userID, title, body) VALUES (?, ?, ?)";
                $params = [$userID, $title, $body];
                $db->query($sql, $params);
            }
        }
        redirect('/group?id=' . $groupID);
    }
    //when a user accepts a pending expense
    else if (isset($_POST['acceptPending'])) {
        $amount = $_POST['amount'];
        $category = $_POST['category'];
        $description = $_POST['desc'];
        $expenseType = $_POST['type'];
        $expenseID = $_POST['expenseID'];
        $currentDateTime = new DateTime();
        $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');
        $groupID = $_GET['id'];

        //update expenseshistory expenseState to 'paid' and expenseTime to Now()
        $db->query("UPDATE expensesHistory SET expenseTime = ?, expenseState = 'paid' WHERE expenseID = ?;", [$currentDateTimeString, $expenseID]);

        //insert into expenses table
        $sql = "INSERT INTO expenses(userID, amount, category, description, expenseType, expenseTime, groupID) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [$userID, $amount, $category, $description, $expenseType, $currentDateTimeString, $groupID];
        $db->query($sql, $params);

        redirect('/group?id=' . $groupID);
    }
    //when a user declines a pending expense
    else if (isset($_POST['declinePending'])) {
        $expenseID = $_POST['expenseID'];
        $currentDateTime = new DateTime();
        $groupID = $_GET['id'];
        $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');
        //update expenseshistory expenseState to 'paid' and expenseTime to Now()
        $db->query("UPDATE expensesHistory SET expenseTime = ?, expenseState = 'declined' WHERE expenseID = ?;", [$currentDateTimeString, $expenseID]);
        redirect('/group?id=' . $groupID);
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
            $groupAllMembersInfo = $db->query("SELECT users.username, users.userIcon, users.userid, users.firstName, users.lastName, clanMembers.roles from clanMembers join users ON clanMembers.userID = users.userid WHERE clanMembers.groupID = ? ORDER BY username ASC;", [$groupID])->fetchAll(PDO::FETCH_ASSOC);
            $groupMembersInfo = array(); //stores list of all members (owner and admin not included)
            foreach ($groupAllMembersInfo as $index => $groupMemberInfo) {
                if ($groupMemberInfo['roles'] !== 'owner') {
                    array_push($groupMembersInfo, $groupMemberInfo);
                } else {
                    $groupOwnerInfo = $groupMemberInfo; //stores information about the group owner
                }
            }

            // [FOR GROUP TRANSACTION]
            $groupTransactionHistory = $db->query('SELECT expensesHistory.* , users.username, users.userIcon from expensesHistory JOIN users ON expensesHistory.userID=users.userid WHERE expensesHistory.groupID=? ORDER BY expenseTime DESC;', [$groupID])->fetchAll(PDO::FETCH_ASSOC);
            $currUserPendings = $db->query("SELECT expensesHistory.* , users.username, users.userIcon from expensesHistory JOIN users ON expensesHistory.userID=users.userid WHERE expensesHistory.groupID=? AND users.userid=? AND expensesHistory.expenseState=? ORDER BY expenseTime DESC;", [$groupID, $userID, 'pending'])->fetchAll(PDO::FETCH_ASSOC);
        }
        //If not a member, user will be redirected to the default group
        else {
            alertRedirect("Inaccessable Group!", "/group");
        }
    }
}

require('views/group/group.view.php');
