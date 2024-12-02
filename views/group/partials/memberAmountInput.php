<li class='flex flex-row justify-end items-center'>
    <!-- User panel -->
    <div class='flex-grow'>
        <?php require('userIcon.view.php') ?>
    </div>
    <!-- Add Expense Button -->
    <div class='flex flex-row justify-center items-center gap-1' id='addAmountField<?= $index ?>'>
        <button onclick='addBtn<?= $index ?>()' type='button' class='btGreen rounded-lg py-1 px-2'>Add Expense</button>
    </div>
    <!-- Behavior -->
    <script>
        function addBtn<?= $index ?>() {
            document.getElementById('addAmountField<?= $index ?>').innerHTML = `
            <p class='textGray'>$</p>
            <input
                class='px-2 py-1 w-24 tlGreen textGray border-none rounded-md'
                type='decimal'
                name='amount<?= $userInfoTemp['userid'] ?>'
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
</li>