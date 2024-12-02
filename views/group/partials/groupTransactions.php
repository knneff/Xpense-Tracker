<!-- Group Transactions -->
<div class="bgGreen overflow-auto flex-1 flex-col px-4 py-2 space-y-12 border-gray-600 border-l border-r">

    <!-- MY PENDING EXPENSES (Filters: All, Pending, Paid, Declined) -->
    <div>
        <!-- TITLE -->
        <div class='flex flex-row justify-between'>
            <h3 class='text-2xl font-bold textGray'>My Pending Expenses</h3>
            <button onclick='collapsePending()'>
                <svg class="size-6 textGray pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path id='pendingExpand' class='hidden' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                    <path id='pendingCollapse' class='' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                </svg>
            </button>
        </div>

        <!-- CONTENT -->
        <div id='pendingList' class='max-h-80 duration-100 ease-in-out py-2 overflow-auto flex flex-col px-2 space-y-2 bg-black bg-opacity-10 border-gray-600 border-t border-b'>
            <?php
            $expenseSize = sizeof($currUserPendings);
            if ($expenseSize < 1) {
                echo "
                    <div class='flex justify-center items-center h-full w-full textGray text-xl'>
                        No Pending Group Expense Yet..
                    </div>
                ";
            } else {
                foreach ($currUserPendings as $index => $expense) {
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
                    require('userPendingRow.php');
                    echo "</ul>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Group Transaction History (Filters: All, Pending, Paid, Declined) -->
    <div>
        <!-- TITLE -->
        <div class='flex flex-row justify-between'>
            <h3 class='text-2xl font-bold textGray'>Group Transactions</h3>
            <button onclick='collapseExpense()'>
                <svg class="size-6 textGray pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path id='expenseExpand' class='hidden' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                    <path id='expenseCollapse' class='' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                </svg>
            </button>
        </div>
        <!-- CONTENT -->
        <div id='expenseList' class='h-80 py-2 overflow-auto flex flex-col px-2 space-y-2 bg-black bg-opacity-10 border-gray-600 border-t border-b duration-200 ease-in-out'>
            <?php
            $expenseSize = sizeof($groupExpenses);
            if ($expenseSize < 1) {
                echo "
                    <div class='flex justify-center items-center h-full w-full textGray text-xl'>
                        No Group Expense Yet..
                    </div>
                ";
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

    <!-- Group Expense Transactions -->

    <!-- Expense Transactions -->




</div>

<script>
    function collapsePending() {
        document.getElementById('pendingList').classList.toggle('max-h-80');
        document.getElementById('pendingList').classList.toggle('py-2');
        document.getElementById('pendingList').classList.toggle('h-0');
        document.getElementById('pendingCollapse').classList.toggle('hidden');
        document.getElementById('pendingExpand').classList.toggle('hidden');
    }

    function collapseExpense() {
        document.getElementById('expenseList').classList.toggle('max-h-80');
        document.getElementById('expenseList').classList.toggle('py-2');
        document.getElementById('expenseList').classList.toggle('max-h-0');
        document.getElementById('expenseCollapse').classList.toggle('hidden');
        document.getElementById('expenseExpand').classList.toggle('hidden');
    }
</script>