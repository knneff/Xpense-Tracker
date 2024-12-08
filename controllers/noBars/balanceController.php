<?php
$userID = $_SESSION['userid'];
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['balanceUpdate'])) {
    $amountToAdd = $_POST['amountToAdd'];

    if ($_POST['balanceType'] === "balanceAdd") {
        $db->query("UPDATE users SET amount = amount + ? WHERE userid = ?;", [$amountToAdd, $userID]);
    } else if ($_POST['balanceType'] === "balanceDeduct") {
        $db->query("UPDATE users SET amount = amount - ? WHERE userid = ?;", [$amountToAdd, $userID]);
    } else if ($_POST['balanceType'] === "balanceSet") {
        $db->query("UPDATE users SET amount = ? WHERE userid = ?;", [$amountToAdd, $userID]);
    }
 
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
}
$balance = $db->query('select amount from users where userid = ?;', [$userID])->fetchColumn();
$_SESSION['balance'] = $balance;
