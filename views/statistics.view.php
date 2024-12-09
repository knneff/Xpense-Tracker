<?php require('partials/body.php') ?>

<div class="flex flex-row justify-center">
  <div style="width: 780px;" class="w-full tlGreen rounded-lg p-4 mr-10 md:p-6">
    <!-- LINE CHART HERE -->
    <?php require('views/partials/line.view.php') ?>
  </div>

  <div class="max-w-lg w-full tlGreen rounded-lg p-4 md:p-6">
    <!-- DONUT CHART HERE -->
    <?php require('views/partials/donut.view.php') ?>
  </div>
</div>

<?php require('partials/footerContent.php') ?>
<?php require('partials/footer.php') ?>