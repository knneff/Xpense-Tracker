<!-- Group Form Container -->
<div id='addGroupExpenseForm' class="bgGreen flex-col border-gray-600 border-l pt-2 space-y-2 h-full overflow-auto pb-4
        w-0 hidden absolute px-0
        md:w-96 md:flex md:static md:px-4  
    ">

    <!-- TITLE -->
    <div class='flex flex-row justify-between'>
        <h3 class='text-lg textGray font-semibold text-center'>Group Expense</h3>
        <button onclick="toggleAddExpensePanel()">
            <svg class="size-6 textGray hover:text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
            </svg>

        </button>
    </div>
    <div class="h-1 bg-gradient-to-r from-green-800 via-gray-600 to-green-800 rounded-lg"></div>
    <!-- MEMBERS -->
    <form class='flex flex-col flex-grow justify-between' method="POST">
        <!-- TOP -->
        <div class='space-y-2'>
            <!-- Members List and Amount Field-->
            <ul class='space-y-2'>
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
                    required
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

            <input name='addGroupExpense' value='true' hidden>
        </div>
        <!-- Bottom (Add Button) -->
        <button type="submit"
            class="w-full btGreen  text-white font-semibold py-2 rounded-md">
            Add Expense
        </button>
    </form>
</div>

<!-- Add Expense Button -->
<button id="addGroupExpenseBtn" onclick="toggleAddExpensePanel()" title="Add Expense" class="md:hidden z-50 h-16 w-16 absolute bottom-4 right-4">
    <svg class="text-gray-300 hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
    </svg>
</button>

<script>
    function toggleAddExpensePanel() {
        // on property
        document.getElementById('addGroupExpenseForm').classList.toggle('w-0');
        document.getElementById('addGroupExpenseForm').classList.toggle('w-full');
        document.getElementById('addGroupExpenseForm').classList.toggle('md:w-0');
        document.getElementById('addGroupExpenseForm').classList.toggle('md:w-96');

        document.getElementById('addGroupExpenseForm').classList.toggle('hidden');
        document.getElementById('addGroupExpenseForm').classList.toggle('flex');
        document.getElementById('addGroupExpenseForm').classList.toggle('md:hidden');
        document.getElementById('addGroupExpenseForm').classList.toggle('md:flex');

        document.getElementById('addGroupExpenseForm').classList.toggle('fixed');
        document.getElementById('addGroupExpenseForm').classList.toggle('static');
        document.getElementById('addGroupExpenseForm').classList.toggle('md:fixed');
        document.getElementById('addGroupExpenseForm').classList.toggle('md:static');

        document.getElementById('addGroupExpenseForm').classList.toggle('px-0');
        document.getElementById('addGroupExpenseForm').classList.toggle('px-4');
        document.getElementById('addGroupExpenseForm').classList.toggle('md:px-4');
        document.getElementById('addGroupExpenseForm').classList.toggle('md:px-0');

        document.getElementById('addGroupExpenseBtn').classList.toggle('hidden');
        document.getElementById('addGroupExpenseBtn').classList.toggle('flex');
        document.getElementById('addGroupExpenseBtn').classList.toggle('md:hidden');
        document.getElementById('addGroupExpenseBtn').classList.toggle('md:flex');
    }
</script>