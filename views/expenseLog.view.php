<?php require('partials/body.php') ?>

<div class='flex flex-col gap-5 sm:px-8 md:px-16 lg:px-24 xl:px-42'>
    <form class='textGray gap-4 flex flex-row justify-between items-center'>
        <!-- FILTERS -->
        <div class='flex flex-row gap-4'>
            <div class='flex flex-row justify-start items-center gap-1'>
                <p>Category</p>
                <select
                    name="category"
                    required
                    class="p-3 rounded-lg border border-gray-400 tlGreen focus:outline-none">
                    <option value="All" <?= ($categ === 'All') ? 'selected' : '' ?>>All</option>
                    <option value="Food" <?= ($categ === 'Food') ? 'selected' : '' ?>>Food</option>
                    <option value="Transportation" <?= ($categ === 'Transportation') ? 'selected' : '' ?>>Transportation</option>
                    <option value="Entertainment" <?= ($categ === 'Entertainment') ? 'selected' : '' ?>>Entertainment</option>
                    <option value="Personal Care" <?= ($categ === 'Personal Care') ? 'selected' : '' ?>>Personal Care</option>
                    <option value="Health & Wellness" <?= ($categ === 'Health & Wellness') ? 'selected' : '' ?>>Health & Wellness</option>
                    <option value="Shopping" <?= ($categ === 'Shopping') ? 'selected' : '' ?>>Shopping</option>
                    <option value="Utilities" <?= ($categ === 'Utilities') ? 'selected' : '' ?>>Utilities</option>
                    <option value="Miscellaneous" <?= ($categ === 'Miscellaneous') ? 'selected' : '' ?>>Miscellaneous</option>
                </select>
            </div>

            <div class='flex flex-row justify-start items-center gap-1'>
                <p>Type</p>
                <select
                    name="type"
                    required
                    class="p-3 rounded-lg border border-gray-400 tlGreen focus:outline-none">
                    <option value="All" <?= ($type === 'All') ? 'selected' : '' ?>>All</option>
                    <option value="basic" <?= ($type === 'basic') ? 'selected' : '' ?>>Basic</option>
                    <option value="group" <?= ($type === 'group') ? 'selected' : '' ?>>Group</option>
                    <option value="goal" <?= ($type === 'goal') ? 'selected' : '' ?>>Goal</option>
                    <option value="subscription" <?= ($type === 'subscription') ? 'selected' : '' ?>>Subscription</option>
                </select>
            </div>
        </div>

        <!-- RELOAD BUTTON -->
        <button class='btGreen p-2 rounded-lg flex flex-row justify-center items-center gap-2'>
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
            </svg>
            <p class='text-center'>Reload Results</p>
        </button>
    </form>

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