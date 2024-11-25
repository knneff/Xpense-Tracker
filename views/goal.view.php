<?php require('partials/head.php') ?>

<main class="grid grid-cols-1 sm:grid-cols-2 gap-7">
    <?php foreach ($goals as $goal) : ?>
        <?php $percent = $goal['paidAmount'] / $goal['amount'] * 100 ?>
        <div class="p-4 flex rounded-lg tlGreen textGray gap-3">
            <div>
                <img
                    class="h-16 w-16 object-cover border border-gray-400"
                    src="<?= $goal['groupIcon'] ?>">
            </div>
            <div class="w-full">
                <div class="grid sm:flex justify-between w-full">
                    <div class="font-semibold text-base sm:text-xl">
                        <?= $goal['description'] ?>
                    </div>
                    <div class="text-sm sm:text-lg items-center">
                        ₱ <?= $goal['paidAmount'] ?> / ₱ <?= $goal['amount'] ?>
                    </div>
                </div>
                <div class="mt-1 sm:mt-3 relative">
                    <div class="w-full bg-[#064E3B] rounded-full h-4 sm:h-6 items-center flex">
                        <div class="bg-[#15956B] h-4 sm:h-6 rounded-full" style="width: <?= $percent ?>%;"></div>
                        <div class="absolute w-full text-center text-sm sm:text-base font-semibold"><?= $percent ?>%</div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <div class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg h-20 sm:h-24">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-gray-300 w-10 h-10 sm:w-14 sm:h-14">
            <path d="M4 12H20M12 4V20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
</main>

<?php require('partials/footer.php') ?>