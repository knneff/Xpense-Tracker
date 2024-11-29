<?php

//once token is generated
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate'])) {
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);
    $groupID = $db->query("select groupID from clan WHERE groupOwnerID=? ORDER BY groupID DESC LIMIT 1;", [$userID])->fetchColumn();

    //stores token to group
    $db->query("UPDATE clan SET groupTokenHash = ?, groupTokenExpiry = ? WHERE groupID = ?;", [$token_hash, $expiry, $groupID]);

    redirect('/shared');

    if ($_POST['newPassword'] === $_POST['confirmPassword']) {
        $userID = $user['userid'];
        $password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password = :password, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE userid = :userid";

        $params = [
            ':password' => $password,
            ':userid' => $userID,
        ];

        $db->query($sql, $params);

        $message = 'Your password has been successfully changed. <a href="/login" class="textTeal hover:underline">Sign In</a>';
    } else {
        $message = "Passwords do not match. Please try again.";
    }
}


$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";

$user = $db->query($sql, [$token_hash])->fetch(PDO::FETCH_ASSOC);

if (!$user || strtotime($user["reset_token_expires_at"]) <= time()) {
    http_response_code(404);
    require('views/404.php');
}


require('views/noBarsPages/reset.view.php');
