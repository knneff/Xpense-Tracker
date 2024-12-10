<?php require('partials/body.php') ?>

<div class="textGray">
    <form class="grid gap-6">
        <!-- UNIT CURRENCY -->
        <div class="flex justify-between">
            <label for="currency" class="mb-2 text-2xl textGray">Currency Symbol</label>
            <select
                name="currency"
                id="currency"
                class="focus:outline-none px-2 bgGreen border border-gray-300 rounded-xl">
                <option selected>Choose Currency</option>
                <option value="₱">₱ - Philippine Peso</option>
                <option value="$">$ - Dollar</option>
                <option value="€">€ - Euro</option>
                <option value="¥">¥ - Yen</option>
            </select>
        </div>

        <hr class="border-gray-400">

        <!-- OVERSPENDING ALARM -->
        <div class="flex justify-between">
            <label for="limit" class="mb-2 text-2xl textGray">Daily Spending Limit Notify</label>
            <div class="flex gap-2">
                <input
                    type="decimal"
                    id='limit'
                    name="limit"
                    placeholder="Spending Limit"
                    value="1000"
                    class="text-lg w-40 pl-4 border border-gray-300 textGray bg-transparent rounded-lg focus:outline-none"
                    required />
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    class="size-8">
                    <path fill="#d1d5db" d="M 18 2 L 15.585938 4.4140625 L 19.585938 8.4140625 L 22 6 L 18 2 z M 14.076172 5.9238281 L 3 17 L 3 21 L 7 21 L 18.076172 9.9238281 L 14.076172 5.9238281 z"></path>
                </svg>
            </div>
        </div>

        <hr class="border-gray-400">

        <div>
            <!-- Threshold -->
            <div class="flex justify-between pb-2">
                <label for="limit" class="mb-2 text-2xl textGray">Spending Threshold Notify</label>
                <div id="percentage-display" class="text-lg w-16 border border-gray-300 textGray bg-transparent rounded-lg focus:outline-none flex items-center justify-center">
                    <div>
                        10%
                    </div>
                </div>

            </div>
            <!-- Threshold SLIDER -->
            <div class="relative mb-6">
                <label for="labels-range-input" class="sr-only">Labels range</label>
                <input
                    id="labels-range-input"
                    type="range"
                    value="75"
                    min="1"
                    max="99"
                    class="w-full h-3 tlGreen rounded-lg appearance-none cursor-pointer"
                    oninput="updatePercentage(this.value)">
                <span class=" text-sm text-gray-300 absolute start start-0 -bottom-6">0%</span>
                <span class="text-sm text-gray-300 absolute start-1/4 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">25%</span>
                <span class="text-sm text-gray-300 absolute start-2/4 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">50%</span>
                <span class="text-sm text-gray-300 absolute start-3/4 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">75%</span>
                <span class="text-sm text-gray-300 absolute end-0 -bottom-6">100%</span>
            </div>
        </div>

        <hr class="border-gray-400">

        <button type='submit' class='btGreen2 rounded-lg py-1 px-2'>Save Settings</button>
    </form>
</div>
<script>
    // JavaScript function to update the displayed percentage
    function updatePercentage(value) {
        const display = document.getElementById('percentage-display');
        display.innerHTML = `<div>${value}%</div>`;
    }
</script>

<?php require('partials/footer.php') ?>