<li class='flex flex-row justify-end items-center'>
    <!-- User panel -->
    <div class='flex-grow'>
        <?php require('userIcon.view.php') ?>
    </div>
    <!-- Add Expense Button -->
    <div class='flex flex-row justify-center items-center gap-1 pr-2' id='addAmountField<?= $index ?>'>
        <p class='textGray'><?= $_SESSION['currency'] ?> </p>
        <input
            class='px-2 py-1 w-24 bgGreen border-none rounded-md'
            type='decimal'
            disabled
            name='amount<?= $userInfoTemp['userid'] ?>'
            required
            placeholder='Amount' />
        <button onclick='addBtn<?= $index ?>()' type='button' class='text-green-500 hover:text-green-300'>
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </button>
    </div>
    <!-- Behavior -->
    <script>
        function addBtn<?= $index ?>() {
            document.getElementById('addAmountField<?= $index ?>').innerHTML = `
            <p class='textGray'><?= $_SESSION['currency'] ?> </p>
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
                <p class='textGray'><?= $_SESSION['currency'] ?> </p>
                <input
                    class='px-2 py-1 w-24 bgGreen border-none rounded-md'
                    type='decimal'
                    disabled
                    name='amount<?= $userInfoTemp['userid'] ?>'
                    required
                    placeholder='Amount' />
                <button onclick='addBtn<?= $index ?>()' type='button' class='text-green-500 hover:text-green-300'>
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            `;
        }
    </script>
</li>