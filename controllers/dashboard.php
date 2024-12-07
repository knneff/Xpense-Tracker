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
$goals = $db->query('select amount, description, paidAmount from goals WHERE userid=? ORDER BY goalID DESC LIMIT 6;', [$userID])->fetchAll(PDO::FETCH_ASSOC);

// for groups tile
$groups = $db->query("SELECT clan.groupName, clan.groupIcon, clan.groupID FROM clan join clanMembers ON clan.groupID=clanMembers.groupID WHERE clanMembers.userid = ? ORDER BY clan.groupID DESC LIMIT 3", [$userID])->fetchAll(PDO::FETCH_ASSOC);

// mga information sa charts potangina bawal maduling dito

require('controllers/noBars/categories.php');
$totalExpense = 0;
foreach ($expenses as $index => $expense) {
    if ($expense['category'] === $categories['food']['label']) {
        $categories['food']['amount'] += $expense['amount'];
    } else if ($expense['category'] === $categories['enter']['label']) {
        $categories['enter']['amount'] += $expense['amount'];
    } else if ($expense['category'] === $categories['trans']['label']) {
        $categories['trans']['amount'] += $expense['amount'];
    } else if ($expense['category'] === $categories['PC']['label']) {
        $categories['PC']['amount'] += $expense['amount'];
    } else if ($expense['category'] === $categories['HW']['label']) {
        $categories['HW']['amount'] += $expense['amount'];
    } else if ($expense['category'] === $categories['shopping']['label']) {
        $categories['shopping']['amount'] += $expense['amount'];
    } else if ($expense['category'] === $categories['utils']['label']) {
        $categories['utils']['amount'] += $expense['amount'];
    } else if ($expense['category'] === $categories['misc']['label']) {
        $categories['misc']['amount'] += $expense['amount'];
    } else {
        $categories['others']['amount'] += $expense['amount'];
    }
    $totalExpense += $expense['amount'];
}
$values = [
    round(($categories['food']['amount'] == 0) ? 0 : $categories['food']['amount'] * 100 / $totalExpense, 2),
    round(($categories['enter']['amount'] == 0) ? 0 : $categories['enter']['amount'] * 100 / $totalExpense, 2),
    round(($categories['trans']['amount'] == 0) ? 0 : $categories['trans']['amount'] * 100 / $totalExpense, 2),
    round(($categories['PC']['amount'] == 0) ? 0 : $categories['PC']['amount'] * 100 / $totalExpense, 2),
    round(($categories['HW']['amount'] == 0) ? 0 : $categories['HW']['amount'] * 100 / $totalExpense, 2),
    round(($categories['shopping']['amount'] == 0) ? 0 : $categories['shopping']['amount'] * 100 / $totalExpense, 2),
    round(($categories['utils']['amount'] == 0) ? 0 : $categories['utils']['amount'] * 100 / $totalExpense, 2),
    round(($categories['misc']['amount'] == 0) ? 0 : $categories['misc']['amount'] * 100 / $totalExpense, 2),
    round(($categories['others']['amount'] == 0) ? 0 : $categories['others']['amount'] * 100 / $totalExpense, 2),
];
$labels = [
    $categories['food']['label'],
    $categories['enter']['label'],
    $categories['trans']['label'],
    $categories['PC']['label'],
    $categories['HW']['label'],
    $categories['shopping']['label'],
    $categories['utils']['label'],
    $categories['misc']['label'],
    $categories['others']['label'],
];
$colors = [
    $categories['food']['color'],
    $categories['enter']['color'],
    $categories['trans']['color'],
    $categories['PC']['color'],
    $categories['HW']['color'],
    $categories['shopping']['color'],
    $categories['utils']['color'],
    $categories['misc']['color'],
    $categories['others']['color'],
];


require('views/dashboard/dashboard.view.php');
