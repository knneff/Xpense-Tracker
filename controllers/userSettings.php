<?php
protectPage();
$title = 'User Settings';
$userID = $_SESSION['userid'];

// if user changes information from user profile including profile pic
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_FILES['icon']) && isset($_POST['changeProfile']) && $_FILES['icon']['error'] === UPLOAD_ERR_OK) {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $findUsername = $db->query('select * from users where username = ?;', [$username])->fetch(PDO::FETCH_ASSOC);
    $findEmail = $db->query('select * from users where email = ?;', [$email])->fetch(PDO::FETCH_ASSOC);

    //validate entered credentials
    if (!ctype_alpha(str_replace(' ', '', $firstname))) {
        $message = "First name contains invalid characters.";
    } else if (!ctype_alpha(str_replace(' ', '', $lastname))) {
        $message = "Last name contains invalid characters.";
    } else if (!preg_match('/^[A-Z][a-z]*( [A-Z][a-z]*)*$/', $firstname)) {
        $message = "First name is not properly capitalized.";
    } else if (!preg_match('/^[A-Z][a-z]*( [A-Z][a-z]*)*$/', $lastname)) {
        $message = "Last name is not properly capitalized.";
    } else if (isset($findUsername['username']) && $findUsername['username'] !== $_POST['currentUsername']) {
        $message = "Username already taken!";
    } else if (isset($findEmail['email']) && $findEmail['email'] !== $_POST['currentEmail']) {
        $message = "Email already taken!";
    } else {
        $icon = $_FILES['icon'];
        $iconName = basename($icon['name']);

        $fileType = strtolower(pathinfo($iconName, PATHINFO_EXTENSION));
        $allowedTypes = ['png', 'jpg', 'jpeg'];

        // when user enters valid file type
        if (in_array($fileType, $allowedTypes)) {
            $userInfo = $db->query("SELECT userIcon FROM users WHERE userid = :userid", [':userid' => $userID])->fetch(PDO::FETCH_ASSOC);
            $currentIconPath = $userInfo['userIcon'];

            // if profile pic is already there
            if (!empty($currentIconPath) && file_exists($currentIconPath) && $currentIconPath !== "assets/icons/user/_default.png") {
                unlink($currentIconPath);
            }

            // generate unique filename/filepath
            $targetDir = "assets/icons/user/";
            $uniqueFileName = uniqid('profile_', true) . '.' . $fileType;
            $targetFilePath = $targetDir . $uniqueFileName;

            // move and resizes image
            if (moveResizedImage($icon, $targetFilePath)) {

                $sql = "UPDATE users SET 
                    firstName = :firstname, 
                    lastName = :lastName, 
                    username = :username,  
                    email = :email, 
                    userIcon = :userIcon 
                    WHERE userid = :userid";

                $params = [
                    ':firstname' => $firstname,
                    ':lastName' => $lastname,
                    ':email' => $email,
                    ':username' => $username,
                    ':userIcon' => $targetFilePath,
                    ':userid' => $userID
                ];

                try {
                    $db->query($sql, $params);
                    $_SESSION['userIcon'] = $targetFilePath;
                    $_SESSION['firstName'] = $firstname;
                    $_SESSION['lastName'] = $lastname;
                    $_SESSION['username'] = $username;
                    header("Location: {$_SERVER['REQUEST_URI']}");
                    exit;
                } catch (PDOException $e) {
                    $message = "An error occurred while processing your request. Please try again later.";
                }
            } else {
                $message = "Error uploading file.";
            }
        } else {
            $message = "Invalid file type. Only PNG, JPEG, and JPG are allowed.";
        }
    }
}
// when user changed profile w/o changing pfp pic
else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['changeProfile'])) {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $findUsername = $db->query('select * from users where username = ?;', [$username])->fetch(PDO::FETCH_ASSOC);
    $findEmail = $db->query('select * from users where email = ?;', [$email])->fetch(PDO::FETCH_ASSOC);

    //validate entered credentials
    if (!ctype_alpha(str_replace(' ', '', $firstname))) {
        $message = "First name contains invalid characters.";
    } else if (!ctype_alpha(str_replace(' ', '', $lastname))) {
        $message = "Last name contains invalid characters.";
    } else if (!preg_match('/^[A-Z][a-z]*( [A-Z][a-z]*)*$/', $firstname)) {
        $message = "First name is not properly capitalized.";
    } else if (!preg_match('/^[A-Z][a-z]*( [A-Z][a-z]*)*$/', $lastname)) {
        $message = "Last name is not properly capitalized.";
    } else if (isset($findUsername['username']) && $findUsername['username'] !== $_POST['currentUsername']) {
        $message = "Username already taken!";
    } else if (isset($findEmail['email']) && $findEmail['email'] !== $_POST['currentEmail']) {
        $message = "Email already taken!";
    } else {

        $sql = "UPDATE users SET 
            firstName = :firstname, 
            lastName = :lastName, 
            username = :username,  
            email = :email
            WHERE userid = :userid";

        $params = [
            ':firstname' => $firstname,
            ':lastName' => $lastname,
            ':email' => $email,
            ':username' => $username,
            ':userid' => $userID
        ];

        try {
            $db->query($sql, $params);
            $_SESSION['firstName'] = $firstname;
            $_SESSION['lastName'] = $lastname;
            $_SESSION['username'] = $username;
            header("Location: {$_SERVER['REQUEST_URI']}");
            exit;
        } catch (PDOException $e) {
            $message = "An error occurred while processing your request. Please try again later.";
        }
    }
}

$userInfo = $db->query("SELECT firstname, lastname, email, username, userIcon FROM users WHERE userid = :userid", [':userid' => $userID])->fetch(PDO::FETCH_ASSOC);

require('views/userSettings.view.php');
