<!-- Group Transactions -->
<div class="flex-1 flex-col px-4 py-2 space-y-8 pb-36 h-screen overflow-auto">

    <!-- Expense Transactions -->
    <div>
        <!-- TITLE -->
        <div class='flex flex-row'>
            <h3 class='text-2xl font-bold textGray'>Group Transactions</h3>
            <button onclick='collapseExpense()'>(collapse)</button>
        </div>
        <!-- CONTENT -->
        <div id='expenseList' class='overflow-auto h-80 flex flex-col py-2 px-2 space-y-2 bg-black bg-opacity-10 border-gray-400 border-t border-b'>
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

    <!-- Pending Transactions -->
    <div>
        <!-- TITLE -->
        <div class='flex flex-row'>
            <h3 class='text-2xl font-bold textGray'>Pending List</h3>
            <button onclick='collapsePending()'>(collapse)</button>
        </div>
        <!-- CONTENT -->
        <div id='pendingList' class='overflow-auto h-80 flex flex-col py-2 px-2 space-y-2 bg-black bg-opacity-10 border-gray-400 border-t border-b'>
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
    function collapseExpense() {
        document.getElementById('expenseList').classList.toggle('h-80');
        document.getElementById('expenseList').classList.toggle('h-0');
    }

    function collapsePending() {
        document.getElementById('pendingList').classList.toggle('h-80');
        document.getElementById('pendingList').classList.toggle('h-0');
    }
</script>