<?php

//If nag-submit yung user sa form:
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fN = $_POST['firstName'];
    $lN = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cPassword = $_POST['confirmPassword'];
    $userIcon = 'assets/user/_default.png';

    //check for already existing email and username
    $findUsername = $db->query('select * from users where username = ?;', [$username])->fetch(PDO::FETCH_ASSOC);
    $findEmail = $db->query('select * from users where email = ?;', [$email])->fetch(PDO::FETCH_ASSOC);

    //validate entered credentials
    if (isset($findUsername['username'])) {
        $errorMessage = "Username already taken!";
    } else if (isset($findEmail['email'])) {
        $errorMessage = "Email already taken!";
    } else if (strlen($password) < 8) {
        $errorMessage = "Password must be at least 8 characters long!";
    } else if (!preg_match('/[A-Z]/', $password)) {
        $errorMessage = "Password must include at least one uppercase letter!";
    } else if (!preg_match('/[a-z]/', $password)) {
        $errorMessage = "Password must include at least one lowercase letter!";
    } else if (!preg_match('/\d/', $password)) {
        $errorMessage = "Password must include at least one number!";
    } else if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $errorMessage = "Password must include at least one special character!";
    } else if ($password != $cPassword) {
        $errorMessage = "Passwords do not match!";
    } else {
        $passwordEncrypted = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $db->query('INSERT INTO `users` (`username`, `password`, `firstName`, `lastName`, `email`, `userIcon`) VALUES (?, ?, ?, ?, ?, ?);', [$username, $passwordEncrypted, $fN, $lN, $email, $userIcon]);
        alertRedirect("The user $username has been created. You can now log in!", '/login');
    }
}

require('views/noBarsPages/signup.view.php');
