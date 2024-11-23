<?php
$userID = $_SESSION['userid'];
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['amountToAdd'])) {
    $amountToAdd = $_POST['amountToAdd'];
    $db->query("UPDATE users SET amount = amount + ? WHERE userid = ?;", [$amountToAdd, $userID]);

    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
}
$balance = $db->query('select amount from users where userid = ?;', [$userID])->fetchColumn();
$_SESSION['balance'] = $balance;
?>

