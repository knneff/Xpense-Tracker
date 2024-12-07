<div class='shadow-lg tlGreen rounded-3xl w-full sm:w-80 h-48 mx-2 my-2 px-4'>
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