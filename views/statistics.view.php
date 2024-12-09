<?php require('partials/body.php') ?>

<div class="flex flex-col md:flex-row justify-center">
  <div class="max-w-[780px] w-full h-full tlGreen rounded-lg px-4 pt-4 mr-20 mb-5 md:mb-0 md:p-6">
  <!-- Line Chart Here -->
  <?php require('views/partials/line.view.php') ?>
</div>

  <div class="max-w-lg w-full h-full tlGreen rounded-lg p-4 md:p-6">
    <!-- DONUT CHART HERE -->
    <?php require('views/partials/donut.view.php') ?>
  </div>
</div>

<?php require('partials/footerContent.php') ?>
<?php require('partials/footer.php') ?>