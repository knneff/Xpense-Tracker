<!-- ADD BALANCE FORM -->
<main id="balancePanel" class="hidden">
    <div id="balanceOverlay" class="z-50 flex justify-center items-center fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50">
        <div class="flex justify-center text-base sm:text-lg text-gray-300 tlGreen p-8 rounded-3xl">
            <div>
                <h2 class="text-4xl font-semibold text-center textGray">Add Balance</h2>
                <hr class="my-4 border-gray-300" />
                <form method="POST" action="" class="flex flex-col text-base gap-5">
                    <div class="flex flex-row my-4 gap-4 items-center">
                        <label for="amount" class="text-2xl font-semibold">Amount: </label>
                        <input
                            type="decimal"
                            name="amountToAdd"
                            placeholder="0"
                            class="p-3 rounded-lg border border-gray-400 tlGreen focus:outline-none"
                            required />
                    </div>
                    <button type="submit" class="py-1 text-lg sm:text-xl font-semibold btGreen2 rounded-3xl">Add Balance</button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- BALANCE ICON -->
<div class="bg-emerald-900 text-base sm:text-xl rounded-xl h-8 flex justify-end items-center pl-1 pr-2">
    <button id="addBalanceButton" class="h-6 w-6 mr-3">
        <svg class="text-gray-300 hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
        </svg>
    </button>
    <?= isset($balance) ? "₱ $balance " : '₱ 0' ?>
</div>

<script>
    document.getElementById('addBalanceButton').addEventListener('click', () => {
        document.getElementById('balancePanel').classList.remove('hidden');
    });

    document.getElementById('balanceOverlay').addEventListener('click', (event) => {
        if (event.target === document.getElementById('balanceOverlay')) {
            document.getElementById('balancePanel').classList.add('hidden');
        }
    });
</script>