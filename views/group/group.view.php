<?php require('partials/bodyGroup.php'); ?>


<!-- Sidebar -->
<?php require('partials/groupSidebar.php'); ?>

<!-- Group Content (TITLE AND CONTENT)-->
<div class='flex flex-col flex-1'>
  <!-- Title and Balance (ROW) -->
  <div class='bgGreen flex flex-row justify-between items-center h-16 pr-4 py-4 drop-shadow-lg text-white font-bold border-gray-600 border-t border-b border-r rounded-tr-lg'>
    <h2 class="text-xl flex tracking-wider items-center"><?= $groupName ?></h2>
    <?php require('views/partials/balance.php') ?>
  </div>

  <!-- Form + Group Transaction (ROW) -->
  <div class='flex flex-row h-full overflow-auto'>
    <!-- Form -->
    <?php require('partials/groupExpenseForm.php') ?>
    <!-- GROUP TRANSACTION -->
    <?php require('partials/groupTransactions.php') ?>
  </div>

</div>

<!-- Member List -->
<?php require('partials/groupMembers.php') ?>