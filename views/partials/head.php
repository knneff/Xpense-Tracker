<!DOCTYPE html>
<html class="h-full overflow-hidden" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <script src="styles/scripts.js"></script>
    <link rel="stylesheet" href="/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="bgGreen flex flex-col h-full">
    <?php require('controllers/balanceController.php') ?>
    <!-- NAV BAR IS HERE -->
    <?php require('navbar.php') ?>
    <!-- FLOATING ADD EXPENSE BUTTON HERE -->
    <?php require('addexpense.php') ?>
    <!-- SIDE BAR AND CONTENT HERE -->
    <div class="flex flex-row flex-1 h-full">
        <!-- SIDE BAR -->
        <?php require('sidebar.php') ?>
        <!-- DITO NA YUNG PINAKACONTENT NINYO -->
        <content class="overflow-auto flex-1 pl-16 pr-4 py-4 mb-16 sm:px-6 md:px-8 lg:px-10 xl:px-12">
            <!-- Header and Balance -->
            <?php require('header.php') ?>