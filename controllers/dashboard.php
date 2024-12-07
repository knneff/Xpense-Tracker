<?php

//protects the page from being accessed when no user is logged in. 
protectPage();

//current user
$userID = $_SESSION['userid'];

//stores information about current user
$userInfo = $db->query('select * from users where userid = ?;', [$userID])->fetch(PDO::FETCH_ASSOC);

// title ng page
$title = "Hello, {$userInfo['username']}!";

//fetch all the current user's expenses and subscription (for expenseTile and subscriptionTile)
$expenses = $db->query('select expenses.amount, expenses.description, expenses.category from users join expenses on users.userID=expenses.userID where users.userID=? ORDER BY expenses.expenseTime;', [$userID])->fetchAll(PDO::FETCH_ASSOC);
$subscriptions = $db->query('select amount, description, period, category from subscriptions WHERE userid=? ORDER BY paymentDateTime DESC LIMIT 4;', [$userID])->fetchAll(PDO::FETCH_ASSOC);
$goals = $db->query('select amount, description, paidAmount from goals WHERE userid=? ORDER BY goalID DESC LIMIT 6;', [$userID])->fetchAll(PDO::FETCH_ASSOC);

// mga information sa charts potangina bawal maduling dito
$categories = [
    'food' => [
        'label' => 'Food',
        'color' => '#F98080',
        'amount' => 0,
    ],
    'enter' => [
        'label' => 'Entertainment',
        'color' => '#E3A008',
        'amount' => 0,
    ],
    'trans' => [
        'label' => 'Transportation',
        'color' => '#4B5563',
        'amount' => 0,
    ],
    'PC' => [
        'label' => 'Personal Care',
        'color' => '#F17EB8',
        'amount' => 0,
    ],
    'HW' => [
        'label' => 'Health & Wellness',
        'color' => '#31C48D',
        'amount' => 0,
    ],
    'shopping' => [
        'label' => 'Shopping',
        'color' => '#76A9FA',
        'amount' => 0,
    ],
    'utils' => [
        'label' => 'Utilities',
        'color' => '#AC94FA',
        'amount' => 0,
    ],
    'misc' => [
        'label' => 'Miscellaneous',
        'color' => '#8DA2FB',
        'amount' => 0,
    ],
    'others' => [
        'label' => 'Others',
        'color' => '#9CA3AF',
        'amount' => 0,
    ]
];
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
