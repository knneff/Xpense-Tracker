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

    //gets the latest group

    //stores token to group
    $db->query("UPDATE clan SET groupTokenHash = ?, groupTokenExpiry = ? WHERE groupID = ?;", [$token_hash, $expiry, $groupID]);
    redirect('/shared?groupID=' . $groupID);

    // if ($_POST['newPassword'] === $_POST['confirmPassword']) {
    //     $userID = $user['userid'];
    //     $password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);

    //     $sql = "UPDATE users SET password = :password, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE userid = :userid";

    //     $params = [
    //         ':password' => $password,
    //         ':userid' => $userID,
    //     ];

    //     $db->query($sql, $params);

    //     $message = 'Your password has been successfully changed. <a href="/login" class="textTeal hover:underline">Sign In</a>';
    // } else {
    //     $message = "Passwords do not match. Please try again.";
    // }
}
//when joining a group
else if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['token'])) {
    $token = $_GET['token'];

    //if invite link does not exist
    $joinGroupInfo = $db->query("SELECT groupID, groupTokenExpiry from clan WHERE groupTokenHash=?", [$token])->fetch(PDO::FETCH_ASSOC);
    if (!$joinGroupInfo) {
        alertRedirect("Invalid group token!", "/shared");
    }

    $joinGroupID = $joinGroupInfo['groupID'];
    $joinGroupTokenExpiry = new DateTime($joinGroupInfo['groupTokenExpiry']);
    $currentDateTime = new DateTime();

    //if invite found pero expire na
    if ($currentDateTime > $joinGroupTokenExpiry) {
        //delete token and expiry
        $db->query("UPDATE clan SET groupTokenHash = NULL, groupTokenExpiry = NULL WHERE groupTokenHash = ?;", [$token]);
        alertRedirect("Group Invitation Token is already expired!", "/shared");
    }

    //if user is already in the group
    $userFoundInGroup = $db->query("SELECT * from clanMembers WHERE userID=? AND groupID=?", [$userID, $joinGroupID])->fetch(PDO::FETCH_ASSOC);
    if ($userFoundInGroup) {
        alertRedirect("User already in the group!", "/shared?groupID=" . $joinGroupID);
    }
    //successfully joined group
    else {
        $db->query("INSERT INTO clanMembers(groupID,userID,roles) VALUES(?, ?, 'member');", [$joinGroupID, $userID]);
        alertRedirect("Group Joined Successfully!", "/shared?groupID=" . $joinGroupID);
    }
}

// $token = $_GET["token"];
// $token_hash = hash("sha256", $token);

// $sql = "SELECT * FROM users WHERE reset_token_hash = ?";

// $user = $db->query($sql, [$token_hash])->fetch(PDO::FETCH_ASSOC);

// if (!$user || strtotime($user["reset_token_expires_at"]) <= time()) {
//     http_response_code(404);
//     require('views/404.php');
// }
