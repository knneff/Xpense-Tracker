<?php require('views/partials/body.php') ?>

<!-- PANELS -->
<main class="flex flex-col sm:flex-row gap-5">
    <!-- LEFT PANELS HERE-->
    <div class='order-2 sm:order-1 flex-1 flex flex-wrap'>
        <?php require('partials/expenseTile.php') ?>
        <?php require('partials/groupTile.php') ?>
        <?php require('partials/subscriptionTile.php') ?>
        <?php require('partials/goalTile.php') ?>
        <?php require('partials/overspendingTile.php') ?>
    </div>

    <!-- RIGHT CHART HERE -->
    <div class='order-1 w-full h-fit sm:w-96 sm:order-2 shadow-lg tlGreen rounded-3xl'>
        <?php require('views/partials/pie.view.php') ?>

    </div>
</main>

<?php require('views/partials/footerContent.php') ?>
<?php require('views/partials/footer.php') ?>