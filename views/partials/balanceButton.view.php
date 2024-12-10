<!-- BALANCE ICON AND BUTTON -->
<div class="bg-emerald-900 text-base sm:text-xl rounded-xl h-8 flex justify-end items-center pl-1 pr-2">
    <button onclick="showBalancePanel()" id="addBalanceButton" class="h-6 w-6 mr-3">
        <svg class="text-gray-300 hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
        </svg>
    </button>
    <?= isset($balance) ? $_SESSION["currency"] . " " . $balance  : $_SESSION["currency"] . ' 0' ?>
</div>

<script>
    function showBalancePanel() {
        document.getElementById('balancePanel').classList.remove('hidden');
    }
</script>