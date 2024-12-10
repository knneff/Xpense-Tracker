<!-- Expense Row -->
<div class='flex flex-row justify-center gap-4 sm:gap-6 md:gap-8 shrink-0 w-full overflow-x-auto'>

    <!-- Expense Card -->
    <div class='w-full textGray rounded-lg border border-gray-400 '>
        <!-- title (description, dateTime) -->
        <div class='flex justify-between items-center rounded-t-lg bgGreen2 px-4 py-1 sm:py-2'>
            <h2 class='text-lg sm:text-xl md:text-2xl font-semibold' id='description'> <?= $description ?> </h2>
            <p class='text-sm sm:text-md md:text-lg'> <?= $expenseTime ?> </p>
        </div>
        <!-- body (category, expenseType, amount) -->
        <div class='flex flex-row justify-between items-center px-4 pb-1 sm:py-2 md:py-3 bgGreen rounded-b-lg'>
            <!-- left -->
            <div class='flex flex-col items-start gap-2'>
                <p class='text-md sm:text-lg md:text-xl  text-gray-300'> Type: <?= $expenseType ?> </p>
                <p class='text-sm sm:text-md md:text-lg text-white bg-[<?= $categoryColor ?>] rounded-lg px-1'> <?= $category ?> </p>
            </div>

            <!-- right -->
            <p class='text-3xl' id='amount'><?= $_SESSION["currency"] . " " . $amount ?> </p>
        </div>
    </div>

    <!-- delete button -->
    <button onclick="<?= 'showDelConf' . $delBtnId . '()' ?>" id='<?= $delBtnId ?>'>
        <svg class='textRed size-8 sm:size-10 md:size-12 hover:text-red-400' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'>
            <path fill-rule='evenodd' d='M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z' clip-rule='evenodd' />
        </svg>
    </button>
</div>

<!-- delete confirmation message -->
<main id='<?= $delConfId ?>' class='hidden fixed z-50'>
    <div id='<?= $delConfOverlayId ?>' class='px-16 flex justify-center items-center fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50'>
        <div class='bgGreen flex justify-center text-base sm:text-lg text-gray-300  p-8 rounded-3xl'>
            <div>
                <h2 class='text-4xl font-semibold text-center textGray'>Delete Confirmation</h2>
                <hr class='my-4 border-gray-300' />
                <form method='POST' action='' class='flex flex-col text-base gap-5'>
                    <input class='hidden' name='toDel' value='<?= $expenseId ?>'>
                    <p>Are you sure you want to remove <i><?= $description ?></i> from your expense?</p>
                    <button type='submit' class='py-1 text-lg sm:text-xl font-semibold btGreen2 rounded-3xl'>Delete Expense</button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- delete button behavior -->
<script>
    function <?= 'showDelConf' . $delBtnId . '()' ?> {
        document.getElementById('<?= $delConfId ?>').classList.toggle('hidden');
    }

    document.getElementById('<?= $delConfOverlayId ?>').addEventListener('click', (event) => {
        if (event.target === document.getElementById('<?= $delConfOverlayId ?>')) {
            document.getElementById('<?= $delConfId ?>').classList.add('hidden');
        }
    });
</script>