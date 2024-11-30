<?php

protectPage();
$userID = $_SESSION['userid'];

//generate token
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['groupID'])) {

    //generate grouptoken
    $groupID = $_POST['groupID'];
    $userID = $_SESSION['userid'];
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    //stores token to group
    $db->query("UPDATE clan SET groupTokenHash = ?, groupTokenExpiry = ? WHERE groupID = ?;", [$token_hash, $expiry, $groupID]);
    redirect('/group?id=' . $groupID);
}
//when joining a group
else if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['token'])) {
    $token = $_GET['token'];

    //if invite link does not exist
    $joinGroupInfo = $db->query("SELECT groupID, groupTokenExpiry from clan WHERE groupTokenHash=?", [$token])->fetch(PDO::FETCH_ASSOC);
    if (!$joinGroupInfo) {
        alertRedirect("Invalid group token!", "/group");
    }

    $joinGroupID = $joinGroupInfo['groupID'];
    $joinGroupTokenExpiry = new DateTime($joinGroupInfo['groupTokenExpiry']);
    $currentDateTime = new DateTime();

    //if invite found pero expire na
    if ($currentDateTime > $joinGroupTokenExpiry) {
        //delete token and expiry
        $db->query("UPDATE clan SET groupTokenHash = NULL, groupTokenExpiry = NULL WHERE groupTokenHash = ?;", [$token]);
        alertRedirect("Group Invitation Token is already expired!", "/group");
    }

    //if user is already in the group
    $userFoundInGroup = $db->query("SELECT * from clanMembers WHERE userID=? AND groupID=?", [$userID, $joinGroupID])->fetch(PDO::FETCH_ASSOC);
    if ($userFoundInGroup) {
        alertRedirect("User already in the group!", '/group?id=' . $joinGroupID);
    }
    //successfully joined group
    else {
        $db->query("INSERT INTO clanMembers(groupID,userID,roles) VALUES(?, ?, 'member');", [$joinGroupID, $userID]);
        alertRedirect("Group Joined Successfully!", '/group?id=' . $joinGroupID);
    }
}
