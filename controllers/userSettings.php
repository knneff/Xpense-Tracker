<?php
protectPage();
$title = 'User Settings';
$userID = $_SESSION['userid'];

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_FILES['icon']) && isset($_POST['changeProfile']) && $_FILES['icon']['error'] === UPLOAD_ERR_OK) {
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $icon = $_FILES['icon'];
    $iconName = basename($icon['name']);

    $fileType = strtolower(pathinfo($iconName, PATHINFO_EXTENSION));
    $allowedTypes = ['png', 'jpg', 'jpeg'];

    if (in_array($fileType, $allowedTypes)) {
        $userInfo = $db->query("SELECT userIcon FROM users WHERE userid = :userid", [':userid' => $userID])->fetch(PDO::FETCH_ASSOC);
        $currentIconPath = $userInfo['userIcon'];

        if (!empty($currentIconPath) && file_exists($currentIconPath)) {
            unlink($currentIconPath);  
        }

        $targetDir = "assets/icons/user/";
        $uniqueFileName = uniqid('profile_', true) . '.' . $fileType;
        $targetFilePath = $targetDir . $uniqueFileName;

        if (move_uploaded_file($icon['tmp_name'], $targetFilePath)) {

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
                $message = "Your profile is successfuly updated";
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
        $message = "Your profile is successfuly updated";
    } catch (PDOException $e) {
        $message = "An error occurred while processing your request. Please try again later.";
    }
        
}

$userInfo = $db->query("SELECT firstname, lastname, email, username, userIcon FROM users WHERE userid = :userid", [':userid' => $userID])->fetch(PDO::FETCH_ASSOC);

require('views/userSettings.view.php');
?>