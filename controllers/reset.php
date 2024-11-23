<?php

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";

$user = $db->query($sql, [$token_hash])->fetch(PDO::FETCH_ASSOC);

if(!$user || strtotime($user["reset_token_expires_at"]) <= time()) {
    http_response_code(404);
    require('views/404.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changePassword'])) {

    if($_POST['newPassword'] === $_POST['confirmPassword']) {
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
require('views/reset.view.php')

?>