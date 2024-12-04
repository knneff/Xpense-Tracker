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