<!-- Add Expense Button -->
<button id="showAddExpensePanel" onclick="showAddExpensePanel()" title="Add Expense" class="h-16 w-16 fixed bottom-4 right-64 z-50">
    <svg class="text-gray-300 hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
    </svg>
</button>

<!-- Group Form Container -->
<div id='addGroupExpenseForm' class="bgGreen flex flex-col border-gray-600 border-l w-96 space-y-2 px-4 pt-2 h-screen pb-36 duration-200 ease-in-out">
    <h3 class='text-lg textGray font-semibold text-center'>Group Expense</h3>
    <div class="h-1 bg-gradient-to-r from-green-800 via-gray-600 to-green-800 rounded-lg"></div>

    <form class='flex flex-col flex-grow justify-between' method="POST">
        <!-- TOP -->
        <div class='space-y-2'>
            <!-- Members List -->
            <ul class='space-y-2 relative'>
                <?php
                foreach ($groupAllMembersInfo as $index => $memberInfo) {
                    $userInfoTemp = $memberInfo;
                    require('memberAmountInput.php');
                }
                ?>
            </ul>
            <div class="h-1 bg-gradient-to-r from-green-800 via-gray-600 to-green-800 rounded-lg"></div>


            <!-- Description Field -->
            <div>
                <label class="block text-gray-300 font-semibold">Description</label>
                <input
                    type="text"
                    name='desc'
                    class="w-full mt-1 p-2 rounded-md tlGreen textGray border-none"
                    placeholder="Enter description" />
            </div>

            <!-- Category Field -->
            <div>
                <label class="block textGray font-semibold">Category</label>
                <select name='category' class="w-full mt-1 p-2 rounded-md tlGreen textGray border-none">
                    <option value="Food">Food</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Personal Care">Personal Care</option>
                    <option value="Health & Wellness">Health & Wellness</option>
                    <option value="Shopping">Shopping</option>
                    <option value="Utilities">Utilities</option>
                    <option value="Miscellaneous">Miscellaneous</option>
                </select>
            </div>

            <input name='type' value='group' hidden>
        </div>

        <!-- Add Button -->
        <button type="submit"
            class="w-full btGreen  text-white font-semibold py-2 rounded-md">
            Add Expense
        </button>

    </form>
</div>

<script>
    function showAddExpensePanel() {
        document.getElementById('addGroupExpenseForm').classList.toggle('w-96');
        document.getElementById('addGroupExpenseForm').classList.toggle('px-4');
        document.getElementById('addGroupExpenseForm').classList.toggle('-translate-x-96');
        document.getElementById('addGroupExpenseForm').classList.toggle('w-0');
    }
</script>

<?php
// <!-- Divider-->

// <!-- Amount Field -->
// <div>
//     <label class="block text-gray-300 font-semibold">Amount</label>
//     <input
//         type="text"
//         class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
//         placeholder="Amount" />
// </div>

// <!-- Date Field -->
// <div>
//     <label class="block text-gray-300 font-semibold">Date</label>
//     <input
//         type="date"
//         class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none" />
// </div>

// <!-- Time Field -->
// <div>
//     <label class="block text-gray-300 font-semibold">Time</label>
//     <input
//         type="time"
//         class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none" />
// </div>
?>