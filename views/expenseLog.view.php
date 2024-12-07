<?php require('partials/body.php') ?>

<div class='flex flex-col gap-5 sm:px-8 md:px-16 lg:px-24 xl:px-42'>

    <?php
    $expenseSize = sizeof($expenses);
    if ($expenseSize < 1) {
        echo "
            <main class='grid place-items-center bgGreen px-4 py-24 sm:py-32 lg:px-8'>
                <div class='text-center py-6 px-8 sm:py-10 sm:px-16 tlGreen rounded-xl'>
                    <h1 class='mt-4 sm:mt-6 text-balance text-3xl sm:text-5xl font-semibold tracking-tight textGray'>No Expense Found</h1>
                    <p class='mt-4 sm:mt-6 text-pretty text-xs sm:text-lg font-medium textGray'>No expense added yet. Keep it up!</p>
                </div>
            </main>
        ";
    } else {
        foreach ($expenses as $index => $expense) {
            $description = stringShortener($expense['description'], 15);
            $expenseTime = formatDateTime($expense['expenseTime']);
            $category = $expense['category'];
            foreach ($categories as $index => $value) {
                if ($category === $value['label']) {
                    $categoryColor = $value['color'];
                    break;
                } else {
                    $categoryColor = $categories['others']['color'];
                }
            }
            $expenseType = $expense['expenseType'];
            $amount = $expense['amount'];
            $expenseId = $expense['expenseID'];
            $delBtnId = "delBtn" . $index;
            $delConfId = "delConf" . $index;
            $delConfOverlayId = "delConfOverlayId" . $index;
            require('partials/expenseRow.php');
        }
    }
    ?>

</div>

<?php require('partials/footerContent.php') ?>
<?php require('partials/footer.php') ?>