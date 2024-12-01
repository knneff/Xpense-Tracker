<?php

$userID = $_SESSION['userid'];

$params = [
    ':userID' => $userID,
];

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


