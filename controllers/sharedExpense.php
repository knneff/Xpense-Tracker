<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['groupName'])) {
    $groupName = $_POST['groupName'];
    $groupIcon = $_POST['groupIcon']; //stores name of the file that was uploaded
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
