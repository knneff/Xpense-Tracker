<?php require('partials/head.php') ?>

<div class="container mx-auto p-4">
    <div>

        <?php

        if (empty($expenses)) {
            echo "no expense found";
            return;
        }

        foreach ($expenses as $expense) {
            $description = stringShortener($expense['description'], 15);
            $expenseTime = formatDateTime($expense['expenseTime']);
            $category = $expense['category'];
            $expenseType = $expense['expenseType'];
            $amount = $expense['amount'];

            echo "
            <div id='simplified' class=' max-w-7xl mx-auto bg-green-900 text-white rounded-lg shadow-lg cursor-pointer ' onclick='toggleView()'>
                <div class='flex justify-between items-center bg-green-800 rounded-t-lg px-4 py-2'>
                    <h2 class='text-lg  ' id='description'> $description </h2>
                    <p class='text-sm  ' id='expense_time'> $expenseTime </p>
                </div>
                <div class='flex justify-between items-start px-4 py-3 bg-[#03352c] '>
                    <div> 
                        <p class='text-sm text-gray-300 pb-2' id='category'> Category: $category </p>
                        <p class='text-sm text-gray-300' id='expense_type'> Type: $expenseType </p>
                    </div>
                    <p class='text-lg font-bold' id='amount'> ₱ $amount </p>
                </div>
            </div>";
        }
        ?>

        <!-- Full View -->
        <form id="fullView" method="POST" action="" class="hidden">

            <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Amount:</span>
                <input type="text" class="text-gray-300 bg-[#03352c]" id="amount" value="$20" />
            </div>

            <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Category:</span>
                <input type="text" class="text-gray-300 bg-[#03352c]" id="category" value="dont know yet" />
            </div>

            <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Description:</span>
                <input type="text" class="text-gray-300 bg-[#03352c]" id="description" value="New York Flight" />
            </div>

            <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Expense Type:</span>
                <input type="text" class="text-gray-300 bg-[#03352c]" id="expense_type" value="Subscription" />
            </div>

            <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Expense Time:</span>
                <input type="text" class="text-gray-300 bg-[#03352c]" id="expense_time" value="11 Sep 2001" />
            </div>

            <div class="flex justify-start space-x-4 mt-4">
                <button onclick="saveChanges()" class="bg-blue-500  text-gray-300 px-4 py-1 rounded-lg hover:bg-blue-600">Save Changes</button>
                <button onclick="deleteExpense()" class="bg-red-500 text-gray-300 px-4 py-1 rounded-lg hover:bg-red-600">Delete</button>
            </div>

        </form>

        <script>
            //global declaration para kunin yung id's nung simplified and fullview
            const simplifiedView = document.getElementById("simplified");
            let fullView = document.getElementById("fullView");
            fullview_classname = "m:max-w-md   sm:p-5 sm:mt-2     md:block lg:block  max-w-7xl    mx-auto     bg-[#03352c]    shadow-lg rounded-lg  p-5 mt-5     cursor-pointer";

            function toggleView() {
                fullView.className = fullview_classname;
            }

            function saveChanges() {
                fullView.className = 'hidden';
            }

            function deleteExpense() {
                fullView.className = 'hidden'; // hahide neto fullview after iclick save changes
            }
        </script>


    </div>


    <?php require('partials/footer.php') ?>