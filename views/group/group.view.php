<?php require('partials/bodyGroup.php'); ?>

<!-- Sidebar + Everything (ROW) -->
<div class='flex'>
  <?php require('partials/groupSidebar.php'); ?>

  <!-- Title + Everything (COL) -->
  <div class='flex flex-col w-full'>
    <h2 class="bgGreen p-4 h-16 drop-shadow-lg text-gray-400 text-xl font-bold flex tracking-wider items-center"><?= $groupName ?></h2>

    <!-- Expense Form + Group Content + Member List (ROW) -->
    <div class="flex flex-row flex-1 h-screen">
      <?php require('partials/groupExpenseForm.php') ?>
      <?php require('partials/groupTransactions.php') ?>
      <?php require('partials/groupMembers.php') ?>
    </div>

  </div>
</div>