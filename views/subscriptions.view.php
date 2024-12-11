<?php require('partials/body.php') ?>

<!-- MY PENDING EXPENSES (Filters: All, Pending, Paid, Declined) -->
<div>
    <!-- TITLE -->
    <div class='flex flex-row justify-between'>
        <h3 class='text-2xl font-bold textGray'>My Pending Expenses</h3>
        <button onclick='collapsePending()'>
            <svg class="size-6 textGray pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path id='pendingExpand' class='hidden' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                <path id='pendingCollapse' class='' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
            </svg>
        </button>
    </div>

    <!-- CONTENT -->
    <div id='pendingList' class='max-h-[500px] py-2 duration-100 ease-in-out overflow-auto scrollbar-custom flex flex-col px-4 sm:px-8 space-y-2 bg-black bg-opacity-10 border-gray-600 border-t border-b'>
        <?php
        $expenseSize = sizeof($currUserPendings);
        if ($expenseSize < 1) {
            echo "
                    <div class='flex justify-center items-center h-full w-full textGray text-xl'>
                        No Pending Expense Yet..
                    </div>
                ";
        } else {
            echo "<ul class='flex flex-col gap-2'>";
            foreach ($currUserPendings as $index => $currUserPending) {
                require('views/partials/userPendingRow.php');
            }
            echo "</ul>";
        }
        ?>
    </div>
</div>

<!-- MY SUBSCRIPTIONS EXPENSES (Filters: All, Pending, Paid, Declined) -->
<div class='pt-8'>
    <!-- TITLE -->
    <div class='flex flex-row justify-between'>
        <h3 class='text-2xl font-bold textGray'>My Subscriptions</h3>
        <button onclick='collapseSubscription()'>
            <svg class="size-6 textGray pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path id='subscriptionExpand' class='hidden' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0-3.75-3.75M17.25 21 21 17.25" />
                <path id='subscriptionCollapse' class='' stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
            </svg>
        </button>
    </div>

    <!-- CONTENT -->
    <div id='subscriptionList' class='max-h-[500px] py-2 duration-100 ease-in-out overflow-auto scrollbar-custom flex flex-col px-4 sm:px-8 space-y-2 bg-black bg-opacity-10 border-gray-600 border-t border-b'>
        <?php
        $subscriptionsSize = sizeof($subscriptions);
        if ($subscriptionsSize < 1) {
            echo "
                    <div class='flex justify-center items-center h-full w-full textGray text-xl'>
                        No Subscriptions Yet..
                    </div>
                ";
        } else {
            echo "<ul class='flex flex-col gap-2'>";
            foreach ($subscriptions as $index => $subscription) {
                require('partials/subscriptionRow.php');
            }
            echo "</ul>";
        }
        ?>
    </div>
</div>


<script>
    function collapsePending() {
        document.getElementById('pendingList').classList.toggle('max-h-[500px]');
        document.getElementById('pendingList').classList.toggle('py-2');
        document.getElementById('pendingList').classList.toggle('h-0');
        document.getElementById('pendingCollapse').classList.toggle('hidden');
        document.getElementById('pendingExpand').classList.toggle('hidden');
    }

    function collapseSubscription() {
        document.getElementById('subscriptionList').classList.toggle('max-h-[500px]');
        document.getElementById('subscriptionList').classList.toggle('py-2');
        document.getElementById('subscriptionList').classList.toggle('max-h-0');
        document.getElementById('subscriptionCollapse').classList.toggle('hidden');
        document.getElementById('subscriptionExpand').classList.toggle('hidden');
    }
</script>

<?php require('partials/footerContent.php') ?>
<?php require('partials/footer.php') ?>