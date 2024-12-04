<?php require('partials/body.php') ?>


<!-- PANELS -->
<main class="flex flex-col sm:flex-row gap-5">
    <!-- LEFT PANELS HERE-->
    <div class='order-2 md:order-1 flex-1 flex flex-wrap'>
        <!-- Recent Expenses -->
        <div class='shadow-lg tlGreen rounded-3xl w-80 h-48 mx-2 my-2 px-4'>
            <!-- Title and Link to Full List -->
            <div class='flex flex-row justify-between items-baseline py-1'>
                <p class="textGray text-xl font-semibold">Recent Expenses</p>
                <a href='/expenselog' class='textTeal hover:underline'>See Full List</a>
            </div>

            <!-- divider -->
            <hr class='border border-1 border-gray-400'>

            <!-- List -->
            <ul class='pt-1'>
                <?php
                if (empty($expenses)) {
                    echo "<p class='text-center py-12 font-semibold textGray'>No Expense Found :/</p>";
                } else {
                    foreach ($expenses as $expense) {
                        $amount = $expense['amount'];
                        $description = $expense['description'];
                        $display = stringShortener('$ ' . $amount . ' - ' . $description, 22);
                        $category = $expense['category'];
                        echo "<li class='textGray flex justify-between items-center'>
                                <p>$display</p>
                                <span class='bgGreen2 rounded-lg px-1 text-xs'>$category</span>
                            </li>";
                    }
                }

                ?>
            </ul>
        </div>

        <!-- GOALS -->
        <div class='shadow-lg tlGreen hover:bg-emerald-900 duration-150 rounded-3xl w-48 h-48 mx-2 my-2 textGray'>
            Goals
        </div>

        <!-- GROUPS -->
        <div class='shadow-lg tlGreen hover:bg-emerald-900 duration-150 rounded-3xl w-48 h-48 mx-2 my-2 textGray'>
            Groups
        </div>

        <!-- SUBSCRIPTIONS -->
        <div class='shadow-lg tlGreen rounded-3xl w-80 h-48 mx-2 my-2 px-4'>
            <!-- Title and Link to Full List -->
            <div class='flex flex-row justify-between items-baseline py-1'>
                <p class="textGray text-xl font-semibold">Subscriptions</p>
                <a href='/subscriptions' class='textTeal hover:underline'>See Full List</a>
            </div>

            <!-- divider -->
            <hr class='border border-1 border-gray-400'>

            <!-- List -->
            <ul class='pt-2 flex flex-col gap-2'>
                <?php
                if (empty($subscriptions)) {
                    echo "<p class='text-center py-12 font-semibold textGray'>No Subscriptions Found :/</p>";
                } else {
                    foreach ($subscriptions as $subscription) {
                        $amount = $subscription['amount'];
                        $description = $subscription['description'];
                        $period = $subscription['period'];
                        if ($period == '1') {
                            $periodDisplay = 'Daily';
                        } else if ($period == '7') {
                            $periodDisplay = 'Weekly';
                        } else if ($period == '30') {
                            $periodDisplay = 'Monthly';
                        } else if ($period == '365') {
                            $periodDisplay = 'Yearly';
                        } else {
                            $periodDisplay = '???';
                        }
                        $tag = $periodDisplay . ' $' . $amount;
                        $display = stringShortener($description, 16);
                        $category = $subscription['category'];
                        echo "<li class='textGray flex items-center gap-2'>
                                <span class='bgGreen2 rounded-lg px-1'>$tag</span>
                                <p>$display</p>
                            </li>";
                    }
                }

                ?>
            </ul>
        </div>

        <!-- OVERSPENDING ALARM -->
        <div class='shadow-lg tlGreen hover:bg-emerald-900 duration-150 rounded-3xl w-48 h-48 mx-2 my-2 textGray'>
            Overspending Alarm
        </div>
    </div>

    <!-- RIGHT CHART HERE -->
    <div class='order-1 w-full h-fit md:w-96 md:order-2 p-4 shadow-lg tlGreen rounded-3xl'>
        <?php require('views/partials/donut.view.php') ?>
    </div>
</main>

<?php require('partials/footerContent.php') ?>
<?php require('partials/footer.php') ?>