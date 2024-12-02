<?php require('views/partials/head.php') ?>
<?php require('controllers/noBars/notifications.php') ?>
<?php require('controllers/noBars/balanceController.php') ?>

<body class="tlGreen h-screen flex flex-col ">
    <!-- NAV BAR IS HERE -->
    <?php require('views/partials/navbar.php') ?>
    <!-- SIDEBAR AND CONTENT HERE -->
    <div class="flex flex-row h-full overflow-auto">
        <!-- SIDE BAR -->
        <?php require('views/partials/sidebar.php') ?>
        <!-- DITO NA YUNG PINAKACONTENT NINYO -->
        <content class="w-full flex flex-row">