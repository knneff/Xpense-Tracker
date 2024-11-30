<!-- Group Transactions -->
<div class="flex-1">

    <div class="container mx-auto p-4">
        <div>
            <div
                id="simplified"
                class="max-w-7xl mx-auto text-white rounded-lg shadow-lg cursor-pointer drop-shadow-lg"
                onclick="toggleView()">
                <div
                    class="flex justify-between items-center bg-green-800 rounded-t-2xl px-4 py-2">
                    <h2 class="text-lg" id="description">Angel's Pizza</h2>
                    <p class="text-sm" id="expense_time">November 22, 2024</p>
                </div>
                <div
                    class="flex justify-between items-start px-4 py-3 bg-[#03352c] rounded-b-2xl">
                    <div>
                        <p class="text-sm text-gray-300 pb-2" id="category">
                            Category: Food
                        </p>
                    </div>
                    <p class="text-lg font-bold" id="amount">₱500</p>
                </div>
            </div>

            <!-- Full View -->
            <form id="fullView" method="POST" action="" class="hidden">
                <div class="flex justify-between border-b pb-3 pt-3">
                    <span class="font-semibold text-gray-300">Amount:</span>
                    <input
                        type="text"
                        class="text-gray-300 bg-[#03352c]"
                        id="amount"
                        value="$500" />
                </div>

                <div class="flex justify-between border-b pb-3 pt-3">
                    <span class="font-semibold text-gray-300">Category:</span>
                    <input
                        type="text"
                        class="text-gray-300 bg-[#03352c]"
                        id="category"
                        value="Food" />
                </div>

                <div class="flex justify-between border-b pb-3 pt-3">
                    <span class="font-semibold text-gray-300">Description:</span>
                    <input
                        type="text"
                        class="text-gray-300 bg-[#03352c]"
                        id="description"
                        value="Angel's Pizza" />
                </div>

                <div class="flex justify-between border-b pb-3 pt-3">
                    <span class="font-semibold text-gray-300">Expense Date:</span>
                    <input
                        type="text"
                        class="text-gray-300 bg-[#03352c]"
                        id="expense_date"
                        value="November 22, 2024" />
                </div>

                <div class="flex justify-between pb-3 pt-3">
                    <span class="font-semibold text-gray-300">Expense Time:</span>
                    <input
                        type="text"
                        class="text-gray-300 bg-[#03352c]"
                        id="expense_time"
                        value="01:47 PM" />
                </div>
            </form>

            <script>
                const simplifiedView = document.getElementById("simplified");
                let fullView = document.getElementById("fullView");

                fullview_classname =
                    "m:max-w-md   sm:p-5 sm:mt-2     md:block lg:block  max-w-7xl    mx-auto     bg-[#03352c]    shadow-lg rounded-lg  p-5 mt-5  drop-shadow-lg   cursor-pointer";

                function toggleView() {
                    if (fullView.classList.contains("hidden")) {
                        fullView.className = fullview_classname;
                    } else {
                        fullView.className = "hidden";
                        simplifiedView.className =
                            "max-w-7xl mx-auto text-white rounded-lg shadow-lg cursor-pointer drop-shadow-lg";
                    }
                }
            </script>
        </div>
    </div>

</div>