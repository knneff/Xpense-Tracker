<!-- Group Form Container -->
<div class="flex flex-col tlGreen w-80 space-y-2 px-4 pt-2 pb-36 ">
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
                    class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
                    placeholder="Enter description" />
            </div>

            <!-- Category Field -->
            <div>
                <label class="block text-gray-300 font-semibold">Category</label>
                <select name='category' class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none">
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