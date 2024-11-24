<?php require('partials/head.php') ?>

<div class="textGray">
    <form>
        <!-- DARK MODE -->
        <label class="inline-flex items-center cursor-pointer">
            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Dark Mode</span>
            <input type="checkbox" value="" class="sr-only peer">
            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        </label>

        <!-- UNIT CURRENCY -->
        <label for="currency" class="mb-2 text-lg textGray">Currency Symbol</label>
        <select name='currency' id="currency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose Currency</option>
            <option value="₱">₱ - Philippine Peso</option>
            <option value="$">$ - Dollar</option>
            <option value="€">€ - Euro - </option>
            <option value="¥">¥ - Yen</option>
        </select>

        <div>
            Notification
        </div>

        <hr>

        <!-- OVERSPENDING ALARM -->
        <label for='limit'>Spending Limit</label>
        <input
            type="decimal"
            id='limit'
            name="limit"
            placeholder="Spending Limit"
            class="w-full p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
            required />

        <label for='alarmPeriod' class="mb-2 text-lg textGray">Currency Symbol</label>

        <select name='alarmPeriod' id="currency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose Period</option>
            <option value="1">Daily</option>
            <option value="7">Weekly</option>
            <option value="30">Monthly</option>
            <option value="365">Yearly</option>
        </select>


        <div class="relative mb-6">
            <label for="labels-range-input" class="sr-only">Labels range</label>
            <input id="labels-range-input" type="range" value="1000" min="100" max="1500" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min ($100)</span>
            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$500</span>
            <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-2/3 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">$1000</span>
            <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max ($1500)</span>
        </div>


        <button type='submit' class='btGreen2 rounded-lg py-1 px-2'>Save Settings</button>
    </form>
</div>

<?php require('partials/footer.php') ?>