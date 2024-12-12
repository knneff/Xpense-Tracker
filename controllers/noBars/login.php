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
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['lastName'] = $user['lastName'];
        $_SESSION['alarmThreshold'] = $user['alarmThreshold'];
        $_SESSION['notification'] = $user['notification'];
        $_SESSION['showTips'] = true;

        $_SESSION['expenseLimit'] = $user['expenseLimit'];
        if ($user["currency"] === "yen") {
            $_SESSION["currency"] = "¥";
        } else if ($user["currency"] === "dollar") {
            $_SESSION["currency"] = "$";
        } else if ($user["currency"] === "euro") {
            $_SESSION["currency"] = "€";
        } else {
            $_SESSION["currency"] = "₱";
        }

        redirect('/dashboard');
    }
}

require("views/noBarsPages/login.view.php");
