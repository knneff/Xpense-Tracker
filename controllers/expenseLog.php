<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['toDel'])) {
    $toDel = $_POST['toDel'];
    $db->query("DELETE FROM expenses WHERE expenseID = ?;", [$toDel]);
}

//current user
$userID = $_SESSION['userid'];

//fetch all the current user's expenses
$expenses = $db->query('select expenses.* from users join expenses on users.userid=expenses.userID where users.userid=? ORDER BY expenses.expenseTime DESC;', [$userID])->fetchAll(PDO::FETCH_ASSOC);

$title = 'Expenses Log';






require('views/expenselog.view.php');
