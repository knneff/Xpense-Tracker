<?php

date_default_timezone_set('Asia/Manila');
$currDateTime = new DateTime();
$currDateTime->modify('-6 day');
$days = [];
$dailyExpenses = [0, 0, 0, 0, 0, 0, 0];
$weeklyTotal = 0;
for ($i = 0; $i < 7; $i++) {
    //puts the day in the array
    array_push($days, $currDateTime->format('M,d'));
    foreach ($expenses7 as $index => $expense) {
        //date of expense
        $expenseDateTime = new DateTime($expense['expenseTime']);
        // if the date of expense matches the date being iterated
        if ($expenseDateTime->format('Y-m-d') == $currDateTime->format('Y-m-d')) {
            $dailyExpenses[$i] += $expense['amount'];
            $weeklyTotal += $expense['amount'];
        }
    }
    $currDateTime->modify('+1 day');
}

/*
target:
last 7 days in array [Dec 10, Dec 11, etc..]
- generate 7 dates starting from NOW()
- get all dateTime 
7 days expenses per day [150, 240, etc..]
*/