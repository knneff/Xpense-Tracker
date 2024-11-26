<?php require('head.php') ?>

<body class="bgGreen flex flex-col h-full">
    <?php require('controllers/noBars/balanceController.php') ?>
    <!-- FLOATING ADD EXPENSE BUTTON HERE -->
    <?php require('addExpense.php') ?>
    <!-- NAV BAR IS HERE -->
    <?php require('navbar.php') ?>
    <!-- SIDE BAR AND CONTENT HERE -->
    <div class="flex flex-row flex-1 h-full">
        <!-- SIDE BAR -->
        <?php require('sidebar.php') ?>
        <!-- DITO NA YUNG PINAKACONTENT NINYO -->
        <content class="overflow-auto flex-1 pl-16 pr-4 py-4 mb-16 sm:px-6 md:px-8 lg:px-10 xl:px-12">
            <!-- Header and Balance -->
            <?php require('contentHeader.php') ?>