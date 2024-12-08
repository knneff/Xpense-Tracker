<?php

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";

$user = $db->query($sql, [$token_hash])->fetch(PDO::FETCH_ASSOC);

if (!$user || strtotime($user["reset_token_expires_at"]) <= time()) {
    http_response_code(404);
    require('views/404.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['changePassword'])) {
     $password = $_POST['newPassword'];
     $cPassword = $_POST['confirmPassword'];

    if (strlen($password) < 8) {
        $message = "Password must be at least 8 characters long!";
    } else if (!preg_match('/[A-Z]/', $password)) {
        $message = "Password must include at least one uppercase letter!";
    } else if (!preg_match('/[a-z]/', $password)) {
        $message = "Password must include at least one lowercase letter!";
    } else if (!preg_match('/\d/', $password)) {
        $message = "Password must include at least one number!";
    } else if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $message = "Password must include at least one special character!";
    } else if ($password != $cPassword) {
        $message = "Passwords do not match!";
    } else {
        $userID = $user['userid'];
        $password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password = :password, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE userid = :userid";

        $params = [
            ':password' => $password,
            ':userid' => $userID,
        ];

        $db->query($sql, $params);

        $message = 'Your password has been successfully changed. <a href="/login" class="textTeal hover:underline">Sign In</a>';
    }
}
require('views/noBarsPages/reset.view.php');
