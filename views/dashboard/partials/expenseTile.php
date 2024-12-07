<!-- RECENT EXPENSES -->
<div class='shadow-lg tlGreen rounded-3xl w-full sm:w-80 h-48 mx-2 my-2 px-4'>
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
            for ($i = 0; $i < 6; $i++) {
                $amount = $expenses[$i]['amount'];
                $description = $expenses[$i]['description'];
                $display = stringShortener('$ ' . $amount . ' - ' . $description, 22);
                $category = $expenses[$i]['category'];
                foreach ($categories as $index => $value) {
                    if ($category === $value['label']) {
                        $categoryColor = $value['color'];
                        break;
                    } else {
                        $categoryColor = $categories['others']['color'];
                    }
                }
                echo "
                    <li class='textGray flex justify-between items-center'>
                        <p>$display</p>
                        <span class='text-white bg-[$categoryColor] rounded-lg px-1 text-xs'>$category</span>
                    </li>
                ";
            }
        }

        ?>
    </ul>
</div>