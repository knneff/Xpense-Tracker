<?php

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
    round($categories['food']['amount'], 2),
    round($categories['enter']['amount'], 2),
    round($categories['trans']['amount'], 2),
    round($categories['PC']['amount'], 2),
    round($categories['HW']['amount'], 2),
    round($categories['shopping']['amount'], 2),
    round($categories['utils']['amount'], 2),
    round($categories['misc']['amount'], 2),
    round($categories['others']['amount'], 2),
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

// dd();
