<?php
//protects the page from being accessed when no user is logged in. 
protectPage();

// Use $_SESSION['userid']; to get logged in user's userid
$userID = $_SESSION['userid'];

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['addGoal']) && isset($_FILES['goalIcon']) && $_FILES['goalIcon']['error'] === UPLOAD_ERR_OK) {
    $description = $_POST['goalDescription'];
    $amount = $_POST['goalAmount'];

    $icon = $_FILES['goalIcon'];
    $iconName = basename($icon['name']);

    $fileType = strtolower(pathinfo($iconName, PATHINFO_EXTENSION));
    $allowedTypes = ['png', 'jpg', 'jpeg'];

    if (in_array($fileType, $allowedTypes)) {
        $targetDir = "assets/icons/goal/";
        $uniqueFileName = uniqid('goalIcon_', true) . '.' . $fileType;
        $targetFilePath = $targetDir . $uniqueFileName;

        if (move_uploaded_file($icon['tmp_name'], $targetFilePath)) {
            $sql = "INSERT INTO goals (userID, description, amount, groupIcon) 
                    VALUES (:userID, :description, :amount, :groupIcon)";

            $params = [
                ':userID' => $userID,
                ':description' => $description,
                ':amount' => $amount,
                ':groupIcon' => $targetFilePath
            ];

            try {
                $db->query($sql, $params);
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
} elseif ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['addGoal'])) {
    $description = $_POST['goalDescription'];
    $amount = $_POST['goalAmount'];
    $targetFilePath = "assets\icons\goal\goalIcon_logo.jpg";

    $sql = "INSERT INTO goals (userID, description, amount, groupIcon) 
                    VALUES (:userID, :description, :amount, :groupIcon)";

    $params = [
        ':userID' => $userID,
        ':description' => $description,
        ':amount' => $amount,
        ':groupIcon' => $targetFilePath
    ];

    try {
        $db->query($sql, $params);
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit;
    } catch (PDOException $e) {
        $message = "An error occurred while processing your request. Please try again later.";
    }
}

$sql = "SELECT goalID, description, amount, paidAmount, groupIcon FROM goals WHERE userID = :userID";

$params = [
    ':userID' => $userID,
];

$goals = $db->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);

$title = "Goals and Plans";

require('views/goal.view.php');
?>