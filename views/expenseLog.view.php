<?php require('partials/head.php') ?>

<div class='flex flex-col gap-5 sm:px-8 md:px-24 lg:px-48 xl:px-64'>

    <?php
    $expenseSize = sizeof($expenses);
    if ($expenseSize < 1) {
        echo "no expense found";
    } else {
        foreach ($expenses as $index => $expense) {
            $description = stringShortener($expense['description'], 15);
            $expenseTime = formatDateTime($expense['expenseTime']);
            $category = $expense['category'];
            $expenseType = $expense['expenseType'];
            $amount = $expense['amount'];
            $expenseId = $expense['expenseID'];
            $delBtnId = "delBtn" . $index;
            $delConfId = "delConf" . $index;
            $delConfOverlayId = "delConfOverlayId" . $index;

            echo "<div>
                <!-- Expense Row -->
                <div class='flex flex-row gap-5'>

                    <!-- expenseCard --> 
                    <div class='flex-1 textGray rounded-lg border border-gray-400'>
                        <!-- title (description, dateTime) -->
                        <div class='flex justify-between items-center rounded-t-lg bgGreen2 px-4 py-2'>
                            <h2 class='text-2xl font-semibold' id='description'> $description </h2>
                            <p class='text-xl'> $expenseTime </p>
                        </div>
                        <!-- body (category, expenseType, amount) -->
                        <div class='flex flex-row justify-between px-4 py-3 bgGreen rounded-b-lg'>
                            <!-- left -->
                            <div class='flex flex-col items-start'> 
                                <p class='text-xl text-gray-300'> Category: $category </p>
                                <p class='text-xl text-gray-300'> Type: $expenseType </p>
                            </div>

                            <!-- right -->
                            <p class='text-3xl' id='amount'> ₱ $amount </p>
                        </div>
                    </div>

                    <!-- delete button -->
                    <button id='$delBtnId'>
                        <svg class='textRed h-10 w-10' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'>
                            <path fill-rule='evenodd' d='M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z' clip-rule='evenodd' />
                        </svg>
                    </button>
                </div>

                <!-- delete confirmation message -->
                <main id='$delConfId' class='hidden'>
                    <div id='$delConfOverlayId' class='z-50 flex justify-center items-center fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50'>
                        <div class='flex justify-center text-base sm:text-lg text-gray-300 tlGreen p-8 rounded-3xl'>
                            <div>
                                <h2 class='text-4xl font-semibold text-center textGray'>Delete Confirmation</h2>
                                <hr class='my-4 border-gray-300' />
                                <form method='POST' action='' class='flex flex-col text-base gap-5'>
                                    <input class='hidden' name='toDel' value='$expenseId'>
                                    <p>Are you sure you want to remove <i>$description</i> from your expense?</p>
                                    <button type='submit' class='py-1 text-lg sm:text-xl font-semibold btGreen2 rounded-3xl'>Delete Expense</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- behavior -->
                <script>
                    document.getElementById('$delBtnId').addEventListener('click', (event) => {
                        document.getElementById('$delConfId').classList.toggle('hidden');
                    })

                    document.getElementById('$delConfOverlayId').addEventListener('click', (event) => {
                        if (event.target === document.getElementById('$delConfOverlayId')) {
                            document.getElementById('$delConfId').classList.add('hidden');
                        }
                    });
                </script>
            
            </div>";
        }
    }
    ?>

</div>

<!--  -->
<?php

/* From louie jay

    <!-- details (all info) -->
    <form class='hidden' id='$detailId' method='POST' action=''>
        <div class='flex justify-between border-b pb-3 pt-3'>
            <span class='font-semibold text-gray-300'>Amount:</span>
            <input type='text' class='text-gray-300 bg-[#03352c]' id='amount' value='$20' />
        </div>
        <div class='flex justify-between border-b pb-3 pt-3'>
            <span class='font-semibold text-gray-300'>Category:</span>
            <input type='text' class='text-gray-300 bg-[#03352c]' id='category' value='dont know yet' />
        </div>
        <div class='flex justify-between border-b pb-3 pt-3'>
            <span class='font-semibold text-gray-300'>Description:</span>
            <input type='text' class='text-gray-300 bg-[#03352c]' id='description' value='New York Flight' />
        </div>
        <div class='flex justify-between border-b pb-3 pt-3'>
            <span class='font-semibold text-gray-300'>Expense Type:</span>
            <input type='text' class='text-gray-300 bg-[#03352c]' id='expense_type' value='Subscription' />
        </div>
        <div class='flex justify-between border-b pb-3 pt-3'>
            <span class='font-semibold text-gray-300'>Expense Time:</span>
            <input type='text' class='text-gray-300 bg-[#03352c]' id='expense_time' value='11 Sep 2001' />
        </div>
        <div class='flex justify-start space-x-4 mt-4'>
            <button onclick='saveChanges()' class='bg-blue-500  text-gray-300 px-4 py-1 rounded-lg hover:bg-blue-600'>Save Changes</button>
            <button onclick='deleteExpense()' class='bg-red-500 text-gray-300 px-4 py-1 rounded-lg hover:bg-red-600'>Delete</button>
        </div>
    </form>

    <script>
        document.getElementById('$index').addEventListener('click', (event) => {
            document.getElementById('$detailId').classList.toggle('hidden');
        })
    </script>

    <script>
        //global declaration para kunin yung id's nung simplified and fullview
        const expenseCard = document.getElementById('$expenseId');
        let fullView = document.getElementById(' $expenseId . details ');
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
    */
?>


<?php require('partials/footer.php') ?>