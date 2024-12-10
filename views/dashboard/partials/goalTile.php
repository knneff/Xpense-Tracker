<!-- GOALS -->
<div class='shadow-lg tlGreen rounded-3xl w-full sm:w-80 h-48 mx-2 my-2 px-4'>
    <!-- Title and Link to Full List -->
    <div class='flex flex-row justify-between items-baseline py-1'>
        <p class="textGray text-xl font-semibold">Goals and Plans</p>
        <a href='/goal' class='textTeal hover:underline'>See Full List</a>
    </div>

    <!-- divider -->
    <hr class='border border-1 border-gray-400'>
    <?php
    if (empty($goals)) {
        echo "<p class='text-center py-12 font-semibold textGray'>No Goals and Plans Found :/</p>";
    } else {
        foreach ($goals as $goal) {
            $percent = floor($goal['paidAmount'] / $goal['amount'] * 100);
            $display = stringShortener($goal['description'], 15);
            echo "
                <div class='textGray flex justify-between items-center my-2'>
                    <div class='flex gap-x-2'> 
                        <img class = 'size-7 rounded-3xl' src ='{$goal['groupIcon']}'>
                        <div class='bgGreen2 rounded-lg px-1 text-base'>{$percent}%</div>
                        <div>$display</div>
                    </div>
                    <div class='bgGreen2 rounded-lg px-1 text-base'>{$_SESSION["currency"]} {$goal['amount']}</div>
                </div>
            ";
        }
    }
    ?>
</div>