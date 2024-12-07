<div class='shadow-lg tlGreen rounded-3xl w-full sm:w-80 h-48 mx-2 my-2 px-4'>
    <!-- Title and Link to Full List -->
    <div class='flex flex-row justify-between items-baseline py-1'>
        <div class='flex flex-row gap-1 textGray items-center'>
            <p class=" text-xl font-semibold">Subscriptions</p>
            <?= ($pendingSubCount > 0) ? "<span class='text-sm px-2 bgRed rounded-3xl text-center'>$pendingSubCount</span>" : "" ?>
        </div>
        <a href='/subscriptions' class='textTeal hover:underline'>See All</a>
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
                $display = stringShortener($description, 16);
                echo "<li class='textGray flex items-center gap-2 justify-between'>
                                <p>₱$amount - $display</p>
                                <span class='bgGreen2 rounded-lg px-1 py-[0.5]'>$periodDisplay</span>
                            </li>";
            }
        }
        ?>
    </ul>
</div>