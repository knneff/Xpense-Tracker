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

    $icon = $_FILES['icon'];
    $iconName = basename($icon['name']);

    $fileType = strtolower(pathinfo($iconName, PATHINFO_EXTENSION));
    $allowedTypes = ['png', 'jpg', 'jpeg'];

    // when user enters valid file type
    if (in_array($fileType, $allowedTypes)) {
        $userInfo = $db->query("SELECT userIcon FROM users WHERE userid = :userid", [':userid' => $userID])->fetch(PDO::FETCH_ASSOC);
        $currentIconPath = $userInfo['userIcon'];

        // if profile pic is already there
        if (!empty($currentIconPath) && file_exists($currentIconPath)) {
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
// when user changed profile w/o changing pfp pic
else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['changeProfile'])) {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];

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

$userInfo = $db->query("SELECT firstname, lastname, email, username, userIcon FROM users WHERE userid = :userid", [':userid' => $userID])->fetch(PDO::FETCH_ASSOC);

require('views/userSettings.view.php');
