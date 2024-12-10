<?php

//protects the page from being accessed when no user is logged in. 
protectPage();

//current user
$userID = $_SESSION['userid'];

//stores information about current user
$userInfo = $db->query('select * from users where userid = ?;', [$userID])->fetch(PDO::FETCH_ASSOC);

// title ng page
$title = "Hello, {$userInfo['username']}!";

// for expensesTile
$expenses = $db->query('select amount, description, category from expenses where userID=? ORDER BY expenses.expenseTime DESC;', [$userID])->fetchAll(PDO::FETCH_ASSOC);

// for subscriptionTile
$subscriptions = $db->query('select amount, description, period, category from subscriptions WHERE userid=? ORDER BY paymentDateTime ASC LIMIT 3;', [$userID])->fetchAll(PDO::FETCH_ASSOC);
$pendingSubCount = $db->query("SELECT COUNT(expensesHistory.expenseID) from expensesHistory JOIN users ON expensesHistory.userID = users.userid WHERE expensesHistory.expenseType=? AND users.userid=? AND expensesHistory.expenseState=? ORDER BY expenseTime ASC;", ['subscription', $userID, 'pending'])->fetchColumn();

// for goals tile
$goals = $db->query('select amount, description, paidAmount, groupIcon from goals WHERE userid=? ORDER BY goalID DESC LIMIT 4;', [$userID])->fetchAll(PDO::FETCH_ASSOC);

// for groups tile
$groups = $db->query("SELECT clan.groupName, clan.groupIcon, clan.groupID FROM clan join clanMembers ON clan.groupID=clanMembers.groupID WHERE clanMembers.userid = ? ORDER BY clan.groupID DESC LIMIT 3", [$userID])->fetchAll(PDO::FETCH_ASSOC);

// mga information sa charts potangina bawal maduling dito
require('controllers/noBars/categories.php');
require('controllers/noBars/statsPieDonut.php');


require('views/dashboard/dashboard.view.php');
