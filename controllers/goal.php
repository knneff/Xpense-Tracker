<?php
//protects the page from being accessed when no user is logged in. 
protectPage();

// Use $_SESSION['userid']; to get logged in user's userid
$userID = $_SESSION['userid'];

$sql = "SELECT goalID, description, amount, paidAmount, groupIcon FROM goals WHERE userID = :userID";

$params = [
    ':userID' => $userID,
];

$goals = $db->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);

$title = "Goals and Plans";

require('views/goal.view.php');
?>