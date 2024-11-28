<?php require('head.php') ?>

<body class="bgGreen flex flex-col h-full">
    <?php require('controllers/noBars/balanceController.php') ?>
    <!-- NAV BAR IS HERE -->
    <?php require('navbar.php') ?>
    <!-- SIDE BAR AND CONTENT HERE -->
    <div class="flex flex-row flex-1 h-full">
        <!-- SIDE BAR -->
        <?php require('sidebar.php') ?>
        <!-- DITO NA YUNG PINAKACONTENT NINYO -->
        <content class="overflow-auto flex-1">