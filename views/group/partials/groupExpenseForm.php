<!-- Group Form Container -->
<div class="tlGreen w-80 p-4">

    <form class="space-y-4" method="POST">
        <!-- Members List -->
        <ul>
            <?php
            foreach ($groupAllMembersInfo as $index => $memberInfo) {
                $memberUserId = $memberInfo['userid'];
                $memberUsername = $memberInfo['username'];
                $memberIcon = $memberInfo['userIcon'];
                require('memberAmountInput.php');
            }
            ?>
        </ul>

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
                <option value="food">Food</option>
                <option value="transportation">Transportation</option>
                <option value="entertainment">Entertainment</option>
                <option value="personal care">Personal Care</option>
                <option value="health & wellness">Health & Wellness</option>
                <option value="shopping">Shopping</option>
                <option value="utilities">Utilities</option>
                <option value="miscellaneous">Miscellaneous</option>
            </select>
        </div>
        <input name='type' value='group' hidden>

        <!-- Add Button -->
        <button
            type="submit"
            class="w-full bg-green-800 hover:bg-green-700 text-white font-semibold py-2 rounded-md">
            Add
        </button>

        <!-- Amount Field -->
        <div>
            <label class="block text-gray-300 font-semibold">Amount</label>
            <input
                type="text"
                class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
                placeholder="Amount" />
        </div>

        <!-- Date Field -->
        <div>
            <label class="block text-gray-300 font-semibold">Date</label>
            <input
                type="date"
                class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none" />
        </div>

        <!-- Time Field -->
        <div>
            <label class="block text-gray-300 font-semibold">Time</label>
            <input
                type="time"
                class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none" />
        </div>


    </form>

</div>

<!-- <script>
    function checkToAdd() {

    }
</script> -->



<?php
// <!-- Divider-->
// <div class="h-1 bg-gradient-to-r from-green-800 via-gray-600 to-green-800 rounded-lg"></div>
?>