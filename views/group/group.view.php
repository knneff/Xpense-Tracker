<?php require('partials/bodyGroup.php'); ?>


<!-- Sidebar -->
<?php require('partials/groupSidebar.php'); ?>

<!-- Group Content (TITLE AND CONTENT)-->
<div class='flex flex-col flex-1'>

  <!-- Title and Balance (ROW) -->
  <div class='flex flex-row bgGreen justify-between h-16 pr-4 py-4 shadow-lg text-white font-bold border-gray-600 border-t border-b border-r rounded-tr-lg'>
    <h2 class="text-xl flex tracking-wider items-center pl-2"><?= $groupName ?></h2>
    <!-- LEFT -->
    <?php require('views/partials/balancePanel.view.php') ?>
    <!-- RIGHT -->
    <div class='flex flex-row gap-2'>
      <?php require('views/partials/balanceButton.view.php') ?>
      <!-- HAMBURGER -->
      <button onclick="toggleMemberMenu()" title="Menu" class="">
        <svg class="size-6 textGray hover:text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
        </svg>
      </button>




    </div>
  </div>

  <!-- Group Content -->
  <div class='flex flex-row h-full overflow-auto relative'>
    <!-- Form -->
    <?php require('partials/groupExpenseForm.php') ?>
    <!-- GROUP TRANSACTION -->
    <?php require('partials/groupTransactions.php') ?>
  </div>

</div>

<!-- Member List -->
<?php require('partials/groupMembers.php') ?>