<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
//Use $_SESSION['userid']; to get logged in user's userid

$title = 'Settings';

$userID = $_SESSION['userid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['systemSettings'])) {
    $currency = $_POST['currency'];
    $expenseLimit = $_POST['limit'];
    $threshold = $_POST['threshold'];

    if (isset($_POST['notification'])) {
        $notification = 1;
    } else {
        $notification = 0;
    }

    $sql = "UPDATE users SET 
            notification = :notification, 
            currency = :currency, 
            expenseLimit = :expenseLimit,  
            alarmThreshold = :threshold
            WHERE userid = :userid";

    $params = [
        ':notification' => $notification,
        ':currency' => $currency,
        ':expenseLimit' => $expenseLimit,
        ':threshold' => $threshold,
        ':userid' => $userID
    ];

    $db->query($sql, $params);

    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
}

$systemInfo = $db->query("SELECT notification, currency, expenseLimit, alarmThreshold FROM users WHERE userid = :userid", [':userid' => $userID])->fetch(PDO::FETCH_ASSOC);

$_SESSION["notification"] = $systemInfo["notification"];
$_SESSION["expenseLimit"] = $systemInfo["expenseLimit"];
$_SESSION["alarmThreshold"] = $systemInfo["alarmThreshold"];

if($systemInfo["currency"] === "yen") {
    $_SESSION["currency"] = "¥";
} else if ($systemInfo["currency"] === "dollar") {
    $_SESSION["currency"] = "$";
} else if ($systemInfo["currency"] === "euro") {
    $_SESSION["currency"] = "€"; 
} else {
    $_SESSION["currency"] = "₱"; 
}

require('views/settings.view.php');
