<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

// when a user deletes an expense
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['toDel'])) {
    $toDel = $_POST['toDel'];
    $db->query("DELETE FROM expenses WHERE expenseID = ?;", [$toDel]);
    redirect($_SERVER['REQUEST_URI']);
}

//current user
$userID = $_SESSION['userid'];
//fetch all the current user's expenses
$expenses = $db->query('select * from expenses where userid=? ORDER BY expenseTime DESC;', [$userID])->fetchAll(PDO::FETCH_ASSOC);

$title = 'Expenses Log';
require('controllers/noBars/categories.php');

require('views/expenselog.view.php');
