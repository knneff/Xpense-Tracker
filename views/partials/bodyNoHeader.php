<?php require('head.php') ?>
<?php require('controllers/noBars/add.php') ?>
<?php require('controllers/noBars/notifications.php') ?>
<?php require('controllers/noBars/balanceController.php') ?>
<?php require('views/partials/balancePanel.view.php') ?>
<?php require('./styles/custom_style.html') ?>

<body class="bgGreen flex flex-col h-full">
    <!-- NAV BAR IS HERE -->
    <?php require('navbar.php') ?>
    <!-- SIDE BAR AND CONTENT HERE -->
    <div class="flex flex-row flex-1 h-full">
        <!-- SIDE BAR -->
        <?php require('sidebar.php') ?>
        <!-- DITO NA YUNG PINAKACONTENT NINYO -->
        <content class="scrollbar-custom overflow-auto flex-1">