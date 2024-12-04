<?php require('head.php') ?>
<?php require('controllers/noBars/add.php') ?>
<?php require('controllers/noBars/notifications.php') ?>
<?php require('controllers/noBars/balanceController.php') ?>
<?php require('views/partials/balancePanel.view.php') ?>

<body class="bgGreen flex flex-col h-full">
    <!-- required sa body ng page para sa mga may charts -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <!-- FLOATING ADD EXPENSE BUTTON HERE -->
    <?php require('add.view.php') ?>
    <!-- NAV BAR IS HERE -->
    <?php require('navbar.php') ?>
    <!-- SIDE BAR AND CONTENT HERE -->
    <div class="flex flex-row flex-1 h-full">
        <!-- SIDE BAR -->
        <?php require('sidebar.php') ?>
        <!-- DITO NA YUNG PINAKACONTENT NINYO -->
        <content class="scrollbar-custom overflow-auto flex-1 pl-16 pr-4 py-4 mb-16 sm:px-6 md:px-8 lg:px-10 xl:px-12">
            <!-- Header and Balance -->
            <?php require('contentHeader.php') ?>