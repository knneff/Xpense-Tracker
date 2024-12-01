<?php require('views/partials/head.php') ?>
<?php require('controllers/noBars/notifications.php') ?>
<?php require('controllers/noBars/balanceController.php') ?>

<body class="tlGreen flex flex-col">
    <?php require('controllers/noBars/balanceController.php') ?>
    <!-- NAV BAR IS HERE -->
    <?php require('views/partials/navbar.php') ?>
    <!-- SIDE BAR AND CONTENT HERE -->
    <div class="flex flex-row flex-1">
        <!-- SIDE BAR -->
        <?php require('views/partials/sidebar.php') ?>
        <!-- DITO NA YUNG PINAKACONTENT NINYO -->
        <content class="flex-1">