<?php
//protects the page from being accessed when no user is logged in. 
protectPage();

// Use $_SESSION['userid']; to get logged in user's userid
$userID = $_SESSION['userid'];

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     dd($_POST);
// }

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['goalDelete'])) {
    $goalID = $_POST['goalUpdateID'];
    $currentIconPath = $_POST['goalUpdateIconPath'];

    if (!empty($currentIconPath) && file_exists($currentIconPath) && $currentIconPath !== "assets/icons/goal/goalIcon_logo.jpg") {
        unlink($currentIconPath);
    }

    $sql = "DELETE FROM goals WHERE goalID = :goalID";

    $params = [
        ':goalID' => $goalID,
    ];

    try {
        $db->query($sql, $params);
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit;
    } catch (PDOException $e) {
        $message = "An error occurred while processing your request. Please try again later.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['goalUpdate']) && isset($_FILES['goalUpdateIcon']) && $_FILES['goalUpdateIcon']['error'] === UPLOAD_ERR_OK) {
    $goalID = $_POST['goalUpdateID'];
    $description = $_POST['goalUpdateDescription'];
    $paidAmount = floatval($_POST['goalUpdatePaidAmount']) + floatval($_POST['goalUpdateAmountPaid']);
    $currentIconPath = $_POST['goalUpdateIconPath'];
    $icon = $_FILES['goalUpdateIcon'];

    if (!empty($currentIconPath) && file_exists($currentIconPath)) {
        unlink($currentIconPath);
    }

    $iconName = basename($icon['name']);
    $fileType = strtolower(pathinfo($iconName, PATHINFO_EXTENSION));
    $allowedTypes = ['png', 'jpg', 'jpeg'];

    if (in_array($fileType, $allowedTypes)) {
        $targetDir = "assets/icons/goal/";
        $uniqueFileName = uniqid('goalIcon_', true) . '.' . $fileType;
        $targetFilePath = $targetDir . $uniqueFileName;

        if (move_uploaded_file($icon['tmp_name'], $targetFilePath)) {
            $sql = "UPDATE goals SET description = :description, paidAmount = :paidAmount, groupIcon = :groupIcon WHERE goalID = :goalID";

            $params = [
                ':description' => $description,
                ':paidAmount' => $paidAmount,
                ':groupIcon' => $targetFilePath,
                ':goalID' => $goalID
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
} elseif ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['goalUpdate'])) {
    $goalID = $_POST['goalUpdateID'];
    $description = $_POST['goalUpdateDescription'];
    $paidAmount = floatval($_POST['goalUpdatePaidAmount']) + floatval($_POST['goalUpdateAmountPaid']);

    $sql = "UPDATE goals SET description = :description, paidAmount = :paidAmount WHERE goalID = :goalID";

    $params = [
        ':description' => $description,
        ':paidAmount' => $paidAmount,
        ':goalID' => $goalID
    ];

    try {
        $db->query($sql, $params);
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit;
    } catch (PDOException $e) {
        $message = "An error occurred while processing your request. Please try again later.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goalUpdate'])) {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $description = $_POST['desc'];
    $expenseType = 'basic';
    $dateTime = $_POST['datetime'];

    $sql = "INSERT INTO expenses (userID, amount, category, description, expenseType, expenseTime)
        VALUES (:userID, :amount, :category, :description, :expenseType, :expenseTime)";

    $params = [
        ':userID' => $userID,
        ':amount' => $amount,
        ':category' => $category,
        ':description' => $description,
        ':expenseType' => $expenseType,
        ':expenseTime' => $dateTime,
    ];

    $db->query($sql, $params);

    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['addGoal']) && isset($_FILES['goalIcon']) && $_FILES['goalIcon']['error'] === UPLOAD_ERR_OK) {
    $description = $_POST['goalDescription'];
    $amount = $_POST['goalAmount'];
    $category = $_POST['goalCategory'];

    $icon = $_FILES['goalIcon'];
    $iconName = basename($icon['name']);

    $fileType = strtolower(pathinfo($iconName, PATHINFO_EXTENSION));
    $allowedTypes = ['png', 'jpg', 'jpeg'];

    if (in_array($fileType, $allowedTypes)) {
        $targetDir = "assets/icons/goal/";
        $uniqueFileName = uniqid('goalIcon_', true) . '.' . $fileType;
        $targetFilePath = $targetDir . $uniqueFileName;

        if (move_uploaded_file($icon['tmp_name'], $targetFilePath)) {
            $sql = "INSERT INTO goals (userID, description, category, amount, groupIcon) 
                    VALUES (:userID, :description, :category, :amount, :groupIcon)";

            $params = [
                ':userID' => $userID,
                ':description' => $description,
                ':amount' => $amount,
                ':category' => $category,
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
    $category = $_POST['goalCategory'];
    $targetFilePath = "assets/icons/goal/goalIcon_logo.jpg";

    $sql = "INSERT INTO goals (userID, description, category, amount, groupIcon) 
                    VALUES (:userID, :description, :category, :amount, :groupIcon)";

    $params = [
        ':userID' => $userID,
        ':description' => $description,
        ':amount' => $amount,
        ':category' => $category,
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
