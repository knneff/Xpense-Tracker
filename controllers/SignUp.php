<?php

//If nag-submit yung user sa form:
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fN = $_POST['firstName'];
    $lN = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cPassword = $_POST['confirmPassword'];
    $userIcon = 'assets/twitter-logo.jpg';

    //check for already existing email and username
    $findUsername = $db->query('select * from users where username = ?;', [$username])->fetch(PDO::FETCH_ASSOC);
    $findEmail = $db->query('select * from users where email = ?;', [$email])->fetch(PDO::FETCH_ASSOC);

    //validate entered credentials
    if (isset($findUsername['username'])) {
        $errorMessage = "Username already taken!";
    } else if (isset($findEmail['email'])) {
        $errorMessage = "Email already taken!";
    } else if ($password == "") {
        $errorMessage = "Invalid password!";
    } else if ($password != $cPassword) {
        $errorMessage = "Password do not match!";
    } else {
        $passwordEncrypted = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $db->query('INSERT INTO `users` (`username`, `password`, `firstName`, `lastName`, `email`, `userIcon`) VALUES (?, ?, ?, ?, ?, ?);', [$username, $passwordEncrypted, $fN, $lN, $email, $userIcon]);
        alertRedirect("The user $username has been created. You can now log in!", '/login');
    }
}

require('views/SignUp.view.php');

?>