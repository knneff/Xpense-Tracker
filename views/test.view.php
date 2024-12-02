<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <?php require('styles/custom_style.html') ?>
    <!-- <script src="/styles/scripts.js"></script> -->
    <!-- for graphs and charts scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
    <!-- SCREEN (COL) -->
    <div class="bg-cyan-400 h-screen flex flex-col ">

        <!-- Navbar -->
        <div class="bg-red-400 w-full h-16 sticky top-0">Hello there</div>

        <!-- Sidebar + Content -->
        <div class="flex flex-row h-full overflow-auto">
            <!-- Sidebar -->
            <div class="bg-lime-400 w-12 flex flex-col justify-between border">
                <div class="bg-purple-400 w-full">Side1</div>
                <div class="bg-purple-400 w-full">Side2</div>
            </div>

            <!-- Panel -->
            <div class="bg-green-400 w-80 flex flex-col justify-between border ">
                <div class="bg-purple-400 w-full">Top</div>
                <div class="bg-purple-400 w-full ">Bottom</div>
                <!-- <p>Content 3</p> -->
            </div>

            <!-- Scrollable content -->
            <div class="bg-green-400 flex-1 flex flex-col border overflow-auto">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo "<div class='bg-pink-400 w-full h-36 min-h-36'></div>";
                    echo "<div class='bg-orange-400 w-full h-36 min-h-36'></div>";
                }
                ?>
            </div>

            <!-- Panel -->
            <div class="bg-green-400 w-80 flex flex-col justify-between border">
                <div class="bg-purple-400 w-full">Top</div>
                <div class="bg-purple-400 w-full ">Bottom</div>
                <!-- <p>Content 3</p> -->
            </div>
        </div>
    </div>
</body>

</html>