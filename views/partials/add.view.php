<!-- Add Expense Button -->
<button id="addPanelOpen" onclick="showPanelAdd()" title="Add Expense" class="size-16 fixed bottom-4 right-8 z-50">
    <svg class="text-gray-300 hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
    </svg>
</button>

<!-- Add Tip -->
<div id='addTip' class='<?= ($_SESSION['showTips'] == true) ? 'block' : 'hidden' ?> fixed bottom-7 text-right right-24 z-50 bg-gray-300 rounded-lg p-2'>
    You can add expenses anytime here!
    <?php
    if ($_SESSION['showTips'] == true) {
        $_SESSION['showTips'] = false;
    };
    ?>
</div>

<!-- Add Panel -->
<main id="addPanel" class="hidden">
    <div id="addOverlay" class="z-50 flex justify-center items-center fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50">
        <div class="flex justify-center text-base sm:text-lg text-gray-300 bgGreen p-8 rounded-3xl">
            <div>
                <h2 class="text-4xl font-semibold text-center textGray">Add Expense</h2>
                <hr class="my-4 border-gray-300" />
                <div class="grid grid-cols-2 gap-4 form-buttons space-x-1 text-lg sm:text-xl font-semibold my-8">
                    <button
                        id="btn1"
                        class="btn py-1 px-4 rounded-3xl btActive"
                        type="button"
                        onclick="showForm('1', 'basic')"
                        disabled>
                        Basic
                    </button>
                    <button
                        id="btn2"
                        class="btn py-1 px-4 rounded-3xl btGreen"
                        type="button"
                        onclick="showForm('2', 'sub')">
                        Subscription
                    </button>
                </div>
                <form id="addForm" method="POST" class="flex flex-col text-base gap-5">
                    <input
                        type="number"
                        min="0"
                        max="1000000"
                        step="0.01"
                        id="amount"
                        name="amount"
                        placeholder="Amount"
                        required
                        class="p-3 rounded-lg border border-gray-400 bgGreen focus:outline-none">
                    <div id="forms2" class="hidden">
                        <div class="flex">
                            <div class="w-3/5">
                                <select
                                    id="form2"
                                    name="period"
                                    class="p-3 rounded-lg border border-gray-400 bgGreen focus:outline-none w-full">
                                    <option value="" disabled selected>Subscription Plan</option>
                                    <option value="1">Daily</option>
                                    <option value="7">Weekly</option>
                                    <option value="30">Monthly</option>
                                    <option value="365">Yearly</option>
                                </select>
                            </div>
                            <div class="text-base sm:text-lg flex items-center justify-center w-2/5 gap-1">
                                <input
                                    type="checkbox"
                                    id="payToday"
                                    name="payToday"
                                    checked>
                                <label
                                    for="payToday">
                                    Pay Today
                                </label>
                            </div>
                        </div>
                    </div>
                    <select
                        id="category"
                        name="category"
                        required
                        class="p-3 rounded-lg border border-gray-400 bgGreen focus:outline-none">
                        <option value="" selected disabled>Category</option>
                        <option value="Food">Food</option>
                        <option value="Transportation">Transportation</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Personal Care">Personal Care</option>
                        <option value="Health & Wellness">Health & Wellness</option>
                        <option value="Shopping">Shopping</option>
                        <option value="Utilities">Utilities</option>
                        <option value="Miscellaneous">Miscellaneous</option>
                    </select>
                    <input
                        type="text"
                        id="desc"
                        name="desc"
                        placeholder="Description"
                        minlength="1"
                        maxlength="30"
                        required
                        class="p-3 rounded-lg border border-gray-400 bgGreen focus:outline-none">
                    <input
                        type="datetime-local"
                        id="datetime"
                        name="datetime"
                        required
                        class="p-3 w-full rounded-lg border border-gray-400 bgGreen focus:outline-none">
                    <input
                        type="hidden"
                        id="type"
                        name="type"
                        value="basic">
                    <input
                        class="hidden"
                        type="text"
                        id="allow"
                        name="allow"
                        required>
                    <button
                        id="submitBtn"
                        class="py-1 text-lg sm:text-xl font-semibold btGreen2 rounded-3xl"
                        type="submit"
                        name="addExpense">
                        Add Expense
                    </button>
                </form>
                <p id="message" class="hidden text-gray-300 mt-4 text-center">Insufficient Balance</p>
            </div>
        </div>
    </div>
</main>

<!-- Behavior -->
<script>
    let balance = <?php echo json_encode($_SESSION['balance']); ?>;

    document.getElementById('amount').addEventListener('input', function() {
        let amount = document.getElementById('amount').value;

        if (amount !== "") {
            if (parseFloat(amount) > parseFloat(balance)) {
                document.getElementById('message').classList.remove('hidden');
                document.getElementById('allow').setAttribute('required', 'true');
            } else {
                document.getElementById('message').classList.add('hidden');
                document.getElementById('allow').removeAttribute('required');
            }
        } else {
            document.getElementById('message').classList.add('hidden');
            document.getElementById('allow').removeAttribute('required');
        }
    });

    function showPanelAdd() {
        document.getElementById('addPanel').classList.remove('hidden');
        document.getElementById('addTip').classList.add('hidden');

        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');

        const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
        document.getElementById('datetime').value = formattedDateTime;
    }

    document.getElementById('addOverlay').addEventListener('click', (event) => {
        if (event.target === document.getElementById('addOverlay')) {
            document.getElementById('addPanel').classList.add('hidden');
        }
    });

    function showForm(id, type) {
        document.querySelectorAll('.btn').forEach(btn => {
            btn.classList.remove('btActive');
            btn.classList.add('btGreen');
            btn.disabled = false;
        });

        document.getElementById('btn' + id).classList.add('btActive');
        document.getElementById('btn' + id).classList.remove('btGreen');
        document.getElementById('btn' + id).disabled = true;


        document.getElementById('forms2').classList.add('hidden');
        document.getElementById('forms' + id)?.classList.remove('hidden');

        document.getElementById('form2').removeAttribute('required');
        document.getElementById('form' + id)?.setAttribute('required', 'true');

        document.getElementById('type').value = type;
    }
</script>