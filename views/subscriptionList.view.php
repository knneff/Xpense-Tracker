<?php require('partials/head.php') ?>


<div class="container mx-auto p-4">

    <!-- Simplified View -->

    <div id="simplified" class=" max-w-7xl mx-auto bg-green-900 text-white rounded-lg shadow-lg cursor-pointer " onclick="toggleView()">

        <div class="flex justify-between items-center bg-green-800 rounded-t-lg px-4 py-2">

            <h2 class="text-lg font-bold" id="description"> New York Flight </h2>
            <p class="text-sm" id="expense_time"> 11 Sep 2001 </p>

        </div>

        <div class="flex justify-between items-start px-4 py-3 bg-[#03352c] ">

            <div> <!--Concatenate nalang dito ung Title saka yung value -->
                <p class="text-sm text-gray-300 pb-2" id="category"> Category: Transportation </p>
                <p class="text-sm text-gray-300" id="expense_type"> Type: Basic </p>
            </div> <!--Concatenate nalang dito ung Title saka yung value -->

            <p class="text-lg font-bold" id="amount"> ₱ 35 </p>

        </div>

    </div>

    <!-- Full View -->
    <form id="fullView" method="POST" action="" class="hidden">


        <div class="flex justify-between border-b pb-3 pt-3">
            <span class="font-semibold text-gray-300">Time of Payment:</span>
            <input type="text" class="text-gray-300 bg-[#03352c]" id="paymentDateTime" value="11 Sep 2001" />
        </div>


        <div class="flex justify-between border-b pb-3 pt-3">
            <span class="font-semibold text-gray-300">Category:</span>
            <input type="text" class="text-gray-300 bg-[#03352c]" id="category" value="Food" />
        </div>


        <div class="flex justify-between border-b pb-3 pt-3">
            <span class="font-semibold text-gray-300">Amount:</span>
            <input type="text" class="text-gray-300 bg-[#03352c]" id="description" value="$35" />
        </div>

        <div class="flex justify-between border-b pb-3 pt-3">
            <span class="font-semibold text-gray-300">Description:</span>
            <input type="text" class="text-gray-300 bg-[#03352c]" id="description" value="New york" />
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
            fullView.className = 'hidden';
        }
    </script>

</div>

<?php require('partials/footer.php') ?>