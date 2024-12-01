<!-- Group Transactions -->
<div class="z-0 flex-1 flex-col px-4 py-2 space-y-12 h-screen overflow-auto border-gray-600 border-l border-r">

    <!-- Pending Transactions -->
    <div>
        <!-- TITLE -->
        <div class='flex flex-row justify-between'>
            <h3 class='text-2xl font-bold textGray'>Pending List</h3>
            <button onclick='collapsePending()'>
                <svg class="size-6 textGray pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path id='pendingExpand' class='' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                    <path id='pendingCollapse' class='hidden' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                </svg>
            </button>
        </div>

        <!-- CONTENT -->
        <div id='pendingList' class='overflow-auto h-0 flex flex-col px-2 space-y-2 bg-black bg-opacity-10 border-gray-600 border-t border-b duration-200 ease-in-out'>
            <?php
            $expenseSize = sizeof($groupExpenses);
            if ($expenseSize < 1) {
                echo "
                <div class='flex justify-center items-center h-full w-full textGray text-xl'>
                    No Group Expense Yet..
                </div>";
            } else {
                foreach ($groupExpenses as $index => $expense) {
                    $description = stringShortener($expense['description'], 15);
                    $expenseTime = formatDateTime($expense['expenseTime']);
                    $category = $expense['category'];
                    $expenseType = $expense['expenseType'];
                    $amount = $expense['amount'];
                    $expenseId = $expense['expenseID'];
                    $delBtnId = "delBtn" . $index;
                    $delConfId = "delConf" . $index;
                    $delConfOverlayId = "delConfOverlayId" . $index;
                    $userInfoTemp = $expense;
                    echo "<ul class='space-y-2'>";
                    require('groupExpenseRow.php');
                    echo "</ul>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Expense Transactions -->
    <div>
        <!-- TITLE -->
        <div class='flex flex-row justify-between'>
            <h3 class='text-2xl font-bold textGray'>Group Transactions</h3>
            <button onclick='collapseExpense()'>
                <svg class="size-6 textGray pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path id='expenseExpand' class='' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                    <path id='expenseCollapse' class='hidden' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                </svg>
            </button>
        </div>
        <!-- CONTENT -->
        <div id='expenseList' class='overflow-auto h-0 flex flex-col px-2 space-y-2 bg-black bg-opacity-10 border-gray-600 border-t border-b duration-200 ease-in-out'>
            <?php
            $expenseSize = sizeof($groupExpenses);
            if ($expenseSize < 1) {
                echo "<main class='grid place-items-center bgGreen px-4 py-24 sm:py-32 lg:px-8'>
                <div class='text-center py-6 px-8 sm:py-10 sm:px-16 tlGreen rounded-xl'>
                    <h1 class='mt-4 sm:mt-6 text-balance text-3xl sm:text-5xl font-semibold tracking-tight textGray'>No Group Expenses Found!</h1>
                    <p class='mt-4 sm:mt-6 text-pretty text-xs sm:text-lg font-medium textGray'>No expense added yet. Keep it up!</p>
                </div>
            </main>";
            } else {
                foreach ($groupExpenses as $index => $expense) {
                    $description = stringShortener($expense['description'], 15);
                    $expenseTime = formatDateTime($expense['expenseTime']);
                    $category = $expense['category'];
                    $expenseType = $expense['expenseType'];
                    $amount = $expense['amount'];
                    $expenseId = $expense['expenseID'];
                    $delBtnId = "delBtn" . $index;
                    $delConfId = "delConf" . $index;
                    $delConfOverlayId = "delConfOverlayId" . $index;
                    $userInfoTemp = $expense;
                    echo "<ul class='space-y-2'>";
                    require('groupExpenseRow.php');
                    echo "</ul>";
                }
            }
            ?>
        </div>
    </div>


</div>

<script>
    function collapsePending() {
        document.getElementById('pendingList').classList.toggle('h-80');
        document.getElementById('pendingList').classList.toggle('py-2');
        document.getElementById('pendingList').classList.toggle('h-0');
        document.getElementById('pendingCollapse').classList.toggle('hidden');
        document.getElementById('pendingExpand').classList.toggle('hidden');
    }

    function collapseExpense() {
        document.getElementById('expenseList').classList.toggle('h-80');
        document.getElementById('expenseList').classList.toggle('py-2');
        document.getElementById('expenseList').classList.toggle('h-0');
        document.getElementById('expenseCollapse').classList.toggle('hidden');
        document.getElementById('expenseExpand').classList.toggle('hidden');
    }
</script>