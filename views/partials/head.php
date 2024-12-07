<!DOCTYPE html>
<html class="h-full overflow-hidden" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="icon" type="image/x-icon" href="assets/xpense logo-01.ico" />

    <!-- PWA manifest -->
    <link rel="manifest" href="/manifest.json" crossorigin="use-credentials">
    <script src="/index.js"></script>

    <!-- for graphs and charts scripts -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" /> -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- STYLES -->
    <?php require('./styles/custom_style.html') ?>
    <script src="styles/scripts.js"></script>
</head>