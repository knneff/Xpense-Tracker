<?php require('partials/bodyNoHeader.php') ?>
<div class="textGray font-bold text-2xl sm:text-4xl flex pb-2 mb-4 border-b border-b-gray-400">
    <?= $title ?>
</div>


<?php foreach ($tickets as $ticket) : ?>
    <?php
    $datetime = new DateTime($ticket["created_at"]);
    $date = $datetime->format("F j, Y");
    $time = $datetime->format("g:i A");
    ?>
    <div class="tlGreen p-4 mb-4 text-gray-300 rounded-xl">
        <div class=" border-b border-b-gray-300 flex justify-between pb-1 mb-4">
            <div class="grid sm:block grid-cols-1 sm:gap-2">
                <span class="text-base sm:text-lg font-semibold">
                    <?= $ticket["name"] ?>
                </span>
                <span class="text-sm sm:text-base text-gray-400">
                    <?= $ticket["email"] ?>
                </span>
            </div>
            <div class="grid sm:flex grid-cols-1 sm:gap-2">
                <div class="text-sm sm:text-base text-end"><?= $time ?></div>
                <div class="text-sm sm:text-base"><?= $date ?></div>
            </div>
        </div>
        <div class="grid">
            <?= $ticket["message"] ?>
            <form method="POST" class="justify-self-end">
                <input
                    type="hidden"
                    value="<?= $ticket["id"] ?>"
                    name="deleteTicket">
                <button
                    class="bg-red-500 rounded-xl text-white py-1 w-24">
                    Delete
                </button>
            </form>
        </div>
    </div>

<?php endforeach ?>

<?php require('partials/footer.php') ?>