<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid


//current user
$userID = $_SESSION['userid'];
//stores information about current user
$userInfo = $db->query('select * from users where userid = ?;', [$userID])->fetch(PDO::FETCH_ASSOC);
//fetch all the current user's expenses
$expenses = $db->query('select expenses.amount, expenses.description, expenses.category from users join expenses on users.userID=expenses.userID where users.userID=? ORDER BY expenses.expenseTime DESC LIMIT 6;', [$userID])->fetchAll(PDO::FETCH_ASSOC);
$subscriptions = $db->query('select amount, description, period, category from subscriptions WHERE userid=? ORDER BY paymentDateTime DESC LIMIT 4;', [$userID])->fetchAll(PDO::FETCH_ASSOC);

$title = "Hello, {$userInfo['username']}!";

require('views/dashboard.view.php');
