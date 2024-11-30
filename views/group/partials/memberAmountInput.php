<!-- Tangina -->
<li class='flex flex-row justify-between items-center px-2 py-1 hover:bg-gray-700 cursor-pointer rounded mb-2'>

    <!--Icon and Username -->
    <div class='flex flex-row'>
        <img src='<?= $memberIcon ?>' class='w-6 h-6 mr-2 rounded-3xl' />
        <span class='text-white'><?= $memberUsername ?></span>
    </div>

    <!-- Add Expense Button -->
    <div class='flex flex-row justify-center items-center gap-1' id='addAmountField<?= $index ?>'>
        <button onclick='addBtn<?= $index ?>()' type='button' class='btGreen rounded-lg py-1 px-2'>Add Expense</button>
    </div>
</li>

<!-- Behavior -->
<script>
    function addBtn<?= $index ?>() {
        document.getElementById('addAmountField<?= $index ?>').innerHTML = `
            <p class='textGray'>$</p>
            <input
                class='px-2 py-1 w-24 bg-gray-600 text-white border-none rounded-md'
                type='decimal'
                name='amount<?= $memberUserId ?>'
                required
                placeholder='Amount' />
            <button onclick='delBtn<?= $index ?>()' type='button' class='textRed hover:text-red-400'>
                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        `;
    }

    function delBtn<?= $index ?>() {
        document.getElementById('addAmountField<?= $index ?>').innerHTML = `
            <button onclick='addBtn<?= $index ?>()' type='button' class='btGreen rounded-lg py-1 px-2 flex flex-row'>Add Expense</button>
        `;
    }
</script>