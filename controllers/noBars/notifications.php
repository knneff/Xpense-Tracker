<?php

$userID = $_SESSION['userid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteNotif'])) {
    $sql = "DELETE FROM notification WHERE userid = :userID";

    $params = [
        ':userID' => $userID,
    ];

    $db->query($sql, $params);

    redirect($_SERVER['REQUEST_URI']);
}

$sql = "SELECT * FROM notification WHERE userID = :userID ORDER BY notifID DESC";

$params = [
    ':userID' => $userID,
];

$notifications = $db->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
?>


