<?php

$userID = $_SESSION['userid'];

$sql = "SELECT * FROM notification WHERE userID = :userID";

$params = [
    ':userID' => $userID,
];

$notifications = $db->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
?>
