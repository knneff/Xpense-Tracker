<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $db->query("select * from users where username = ?", [$username])->fetch(PDO::FETCH_ASSOC);
    if (!isset($user['userid'])) {
        $errorMessage = "Username not found!";
    } else if (!password_verify($password, $user['password'])) {
        $errorMessage = "Incorrect password!";
    } else {
        session_start();
        $_SESSION['userid'] = $user['userid'];
        $_SESSION['userIcon'] = $user['userIcon'];
        redirect('/dashboard');
    }
}

require("views/login.view.php");

?>