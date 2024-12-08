<!-- ADD BALANCE PANEL -->
<div id="balancePanel" class="hidden z-50">
    <div id="balanceOverlay" class="fixed w-screen h-screen top-0 left-0  flex justify-center items-center  bg-black bg-opacity-50">
        <div class="flex justify-center text-base sm:text-lg text-gray-300 bgGreen p-8 rounded-3xl">
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
                            class="p-3 rounded-lg border border-gray-400 bgGreen focus:outline-none"
                            required />
                    </div>
                    <button type="submit" class="py-1 text-lg sm:text-xl font-semibold btGreen2 rounded-3xl">Add Balance</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Panel Exist Mechanism -->
<script>
    document.getElementById('balanceOverlay').addEventListener('click', (event) => {
        if (event.target === document.getElementById('balanceOverlay')) {
            document.getElementById('balancePanel').classList.add('hidden');
        }
    });
</script>