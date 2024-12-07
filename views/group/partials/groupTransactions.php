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
        <div id='pendingList' class='max-h-[500px] py-2 duration-100 ease-in-out  overflow-auto flex flex-col px-2 space-y-2 bg-black bg-opacity-10 border-gray-600 border-t border-b'>
            <?php
            $expenseSize = sizeof($currUserPendings);
            if ($expenseSize < 1) {
                echo "
                    <div class='flex justify-center items-center h-full w-full textGray text-xl'>
                        No Pending Expense Yet..
                    </div>
                ";
            } else {
                echo "<ul class='flex flex-col gap-2'>";
                foreach ($currUserPendings as $index => $currUserPending) {
                    require('views/partials/userPendingRow.php');
                }
                echo "</ul>";
            }
            ?>

        </div>


    </div>

    <!-- Group Transaction History (Filters: All, Pending, Paid, Declined) -->
    <div>
        <!-- TITLE -->
        <div class='flex flex-row justify-between'>
            <h3 class='text-2xl font-bold textGray'>Group Transactions History</h3>
            <button onclick='collapseExpense()'>
                <svg class="size-6 textGray pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path id='expenseExpand' class='hidden' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                    <path id='expenseCollapse' class='' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                </svg>
            </button>
        </div>
        <!-- CONTENT -->
        <div id='expenseList' class='max-h-[500px] py-2 duration-100 ease-in-out overflow-auto flex flex-col px-2 space-y-2 bg-black bg-opacity-10 border-gray-600 border-t border-b'>
            <?php
            $expenseSize = sizeof($groupTransactionHistory);
            if ($expenseSize < 1) {
                echo "
                    <div class='flex justify-center items-center h-full w-full textGray text-xl'>
                        No Group Transactions Yet..
                    </div>
                ";
            } else {
                echo "<ul class='flex flex-col gap-2'>";
                foreach ($groupTransactionHistory as $index => $transactionRow) {
                    require('groupHistoryRow.php');
                }
                echo "</ul>";
            }
            ?>
        </div>
    </div>

</div>

<script>
    function collapsePending() {
        document.getElementById('pendingList').classList.toggle('max-h-[500px]');
        document.getElementById('pendingList').classList.toggle('py-2');
        document.getElementById('pendingList').classList.toggle('h-0');
        document.getElementById('pendingCollapse').classList.toggle('hidden');
        document.getElementById('pendingExpand').classList.toggle('hidden');
    }

    function collapseExpense() {
        document.getElementById('expenseList').classList.toggle('max-h-[500px]');
        document.getElementById('expenseList').classList.toggle('py-2');
        document.getElementById('expenseList').classList.toggle('max-h-0');
        document.getElementById('expenseCollapse').classList.toggle('hidden');
        document.getElementById('expenseExpand').classList.toggle('hidden');
    }
</script>