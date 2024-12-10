<?php

$tempDescription = $transactionRow['description']; //
$tempExpenseTime = formatDateTime($transactionRow['expenseTime']); //
$tempCategory = $transactionRow['category']; //
foreach ($categories as $index => $value) {
    if ($tempCategory === $value['label']) {
        $tempCategoryColor = $value['color'];
        break;
    } else {
        $tempCategoryColor = $categories['others']['color'];
    }
}
$tempAmount = $transactionRow['amount']; //
$tempExpenseId = $transactionRow['expenseID']; //
$tempExpenseState = $transactionRow['expenseState'];
$userInfoTemp = $transactionRow;

?>

<!-- Pending Card -->
<div class='flex-1 textGray rounded-lg border border-gray-400'>
    <!-- title (description, dateTime) -->
    <div class='flex justify-between items-center rounded-t-lg bgGreen2 px-2 py-1'>
        <h2 class='text-xl font-semibold' id='description'> <?= stringShortener($tempDescription, 15) ?> </h2>
        <p class='text-md sm:text-lg text-end'> <?= $tempExpenseTime ?> </p>
    </div>
    <!-- body (category, expenseType, amount) -->
    <div class='flex flex-row justify-between items-center px-2 py-2 bgGreen rounded-b-lg'>
        <!-- left -->
        <div class='flex flex-row items-center <?= ($tempExpenseState === 'paid') ? 'text-green-400' : (($tempExpenseState === 'declined') ? 'textRed' : 'text-orange-500') ?>'>
            <?php
            if ($tempExpenseState === 'paid') {
                echo "<svg class='size-14 text-green-400' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z' />
                    </svg>";
            } else if ($tempExpenseState === 'declined') {
                echo "<svg class='size-14 texRed' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M6 18 18 6M6 6l12 12' />
                    </svg>";
            } else {
                echo "<svg class='size-14 text-orange-500' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z' />
                    </svg>";
            }
            ?>
            <div class='flex flex-col'>
                <p class='text-xl font-semibold'> ₱ <?= $tempAmount ?> </p>
                <p class='text-xs'><?= ($tempExpenseState === 'paid') ? 'Payment Accepted!' : (($tempExpenseState === 'declined') ? 'Payment Declined!' : 'Pending Payment..') ?></p>
            </div>
        </div>
        <!-- right -->
        <div class='flex flex-col items-end gap-2'>
            <?php require('userIcon.view.php') ?>
            <p class='text-end text-md text-white bg-[<?= $tempCategoryColor ?>] rounded-lg px-1'> <?= $tempCategory ?> </p>
        </div>
    </div>
</div>