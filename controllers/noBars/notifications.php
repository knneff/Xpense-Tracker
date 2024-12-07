<?php

$userID = $_SESSION['userid'];

$params = [
    ':userID' => $userID,
];

$expenseLimit = 1000;  // set limit, temporrary as of now
$alarmThreshold = 80;  // 80% it alarms
date_default_timezone_set('Asia/Manila');
$todayStart = date('Y-m-d 00:00:00');
$todayEnd = date('Y-m-d 23:59:59');

$totalExpense = $db->query(
    'SELECT SUM(amount) as totalAmount FROM expenses WHERE expenseTime BETWEEN ? AND ? AND userID = ?',
    [$todayStart, $todayEnd, $userID]
)->fetch(PDO::FETCH_ASSOC);

$expenseToday = floatval($totalExpense['totalAmount']);
$expensePercent = floor($expenseToday / $expenseLimit * 100);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteNotif'])) {
    $sql = "DELETE FROM notification WHERE userid = :userID";

    $db->query($sql, $params);
    redirect($_SERVER['REQUEST_URI']);
}

$sqlNotif = "SELECT * FROM notification WHERE userID = :userID ORDER BY notifID DESC";
$sqlCount = "SELECT notifID FROM notification WHERE isViewed = 0 AND userID = :userID;";

$notifications = $db->query($sqlNotif, $params)->fetchAll(PDO::FETCH_ASSOC);
$count = $db->query($sqlCount, $params)->fetchAll(PDO::FETCH_ASSOC);
$count = array_column($count, 'notifID');



?>


