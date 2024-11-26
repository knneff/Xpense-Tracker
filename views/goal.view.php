<?php require('partials/body.php') ?>

<?php if (isset($message)) : ?>
    <p class="text-gray-300 my-4 text-center text-xl "><?= $message ?></p>
<?php endif; ?>
<main class="grid grid-cols-1 lg:grid-cols-2 gap-7">
    <button
        class="active:scale-95 transition-transform"
        type="button"
        onclick="showPanelGoal()">
        <div class="flex items-center justify-center border-2 border-dashed hover:border-white border-gray-300 rounded-lg h-20 sm:h-24">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-gray-300 w-10 h-10 sm:w-14 sm:h-14">
                <path d="M4 12H20M12 4V20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </button>
    <?php foreach ($goals as $goal) : ?>
        <?php $percent = floor($goal['paidAmount'] / $goal['amount'] * 100) ?>
        <button
            class="active:scale-95 transition-transform"
            type="button"
            onclick="showPanelGoalUpdate(
                '<?= $goal['goalID'] ?>', 
                '<?= $goal['description'] ?>', 
                '<?= $goal['amount'] ?>', 
                '<?= $goal['paidAmount'] ?>', 
                '<?= $goal['groupIcon'] ?>',
                '<?= $percent ?>'
            )">
            <div class="p-4 flex rounded-lg tlGreen textGray gap-3 shadow-lg">
                <div>
                    <img
                        class="h-16 w-16 object-cover border border-gray-400"
                        src="<?= $goal['groupIcon'] ?>">
                </div>
                <div class="w-full">
                    <div class="grid sm:flex justify-between w-full">
                        <div class="font-bold text-base sm:text-xl text-start">
                            <?= $goal['description'] ?>
                        </div>
                        <div class="text-sm sm:text-lg font-semibold items-center">
                            ₱ <?= $goal['paidAmount'] ?> / ₱ <?= $goal['amount'] ?>
                        </div>
                    </div>
                    <div class="mt-1 sm:mt-3 relative">
                        <div class="w-full bg-[#064E3B] rounded-sm h-4 sm:h-6 items-center flex">
                            <div class="bg-[#15956B] rounded-sm h-4 sm:h-6" style="width: <?= $percent ?>%;"></div>
                            <div class="absolute w-full text-center text-lg sm:text-base font-semibold"><?= $percent ?>%</div>
                        </div>
                    </div>
                </div>
            </div>
        </button>
    <?php endforeach ?>
</main>
<main id="goalPanel" class="hidden">
    <div id="goalOverlay" class="z-50 flex justify-center items-center fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50">
        <div class="flex flex-col justify-center text-base sm:text-lg text-gray-300 tlGreen p-8 rounded-3xl">
            <h2 class="text-4xl font-semibold text-center textGray">Goals and Plans</h2>
            <hr class="mt-4 mb-6 border-gray-300" />
            <form id="goalForm" method="POST" class="flex flex-col text-base gap-5" enctype="multipart/form-data">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="flex items-center justify-center h-full">
                        <div class="relative">
                            <img
                                id="goalPreview"
                                src="assets\icons\goal\goalIcon_logo.jpg"
                                alt="Profile"
                                class="w-28 h-28 md:w-32 md:h-32 rounded-full border-4 border-gray-400 object-cover" />
                            <button
                                type="button"
                                class="absolute bottom-1 right-1 btGreen w-8 sm:w-10 sm:text-base font-semibold p-1 rounded-3xl focus:outline-none"
                                onclick="document.getElementById('goalIcon').click()">
                                <svg
                                    viewBox="0 0 512 512"
                                    version="1.1"
                                    xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path fill="#d1d5db" class="st0" d="M307.81,212.18c-3.24,0-6.07-2.17-6.91-5.3l-4.82-17.88c-0.84-3.12-3.68-5.3-6.91-5.3h-21.46h-25.44H220.8     c-3.24,0-6.07,2.17-6.91,5.3l-4.82,17.88c-0.84,3.12-3.68,5.3-6.91,5.3H169.5c-3.96,0-7.16,3.21-7.16,7.16v101.78     c0,3.96,3.21,7.16,7.16,7.16h170.95c3.96,0,7.16-3.21,7.16-7.16V219.35c0-3.96-3.21-7.16-7.16-7.16H307.81z M282.33,264.94     c-0.86,13.64-11.93,24.71-25.58,25.58c-16.54,1.05-30.18-12.59-29.14-29.14c0.86-13.64,11.93-24.71,25.58-25.58     C269.74,234.76,283.38,248.4,282.33,264.94z" />
                                    <path fill="#d1d5db" class="st0" d="M82.95,272.41c3.82,0,7.53-1.53,10.23-4.23l21.23-21.23c4.74-4.74,6.4-11.92,3.73-18.06     c-2.73-6.29-8.88-8.95-18.84-7.57l-0.27,0.27c15.78-71.56,79.7-125.27,155.94-125.27c60.72,0,115.41,33.72,142.73,87.99     c3.58,7.11,12.24,9.97,19.34,6.39c7.11-3.58,9.97-12.24,6.39-19.34c-15.47-30.73-39.05-56.66-68.22-75.01     C325.23,77.47,290.57,67.5,254.98,67.5c-93,0-170.48,67.71-185.75,156.41c-5.38-4.77-13.59-5.18-19.13-0.44     c-6.3,5.39-6.75,14.88-1.13,20.84c0.23,0.24,5.69,6.03,11.41,11.93c3.41,3.51,6.2,6.33,8.3,8.38c4.23,4.13,7.88,7.69,14.07,7.78     C82.81,272.41,82.88,272.41,82.95,272.41z" />
                                    <path fill="#d1d5db" class="st0" d="M464.28,247.82l-26.5-26.5c-2.75-2.75-6.57-4.3-10.44-4.23c-2.33,0.03-4.29,0.56-6.07,1.42     c-0.26,0.12-0.51,0.26-0.76,0.4c-0.04,0.02-0.08,0.04-0.12,0.06c-0.59,0.33-1.16,0.68-1.69,1.08c-1.88,1.34-3.6,3.03-5.44,4.82     c-2.1,2.05-4.89,4.87-8.3,8.38c-5.72,5.9-11.18,11.68-11.41,11.93c-5.46,5.79-5.19,14.91,0.6,20.36     c5.75,5.42,14.77,5.18,20.24-0.48c-4.72,83.85-74.42,150.62-159.43,150.62c-70.52,0-131.86-45.23-152.62-112.55     c-2.35-7.6-10.41-11.86-18.01-9.52c-7.6,2.34-11.86,10.41-9.52,18.01c11.62,37.68,35.48,71.52,67.19,95.28     c32.8,24.59,71.86,37.58,112.96,37.58c100.11,0,182.23-78.45,188.14-177.1l0.79,0.79c2.81,2.81,6.5,4.22,10.18,4.22     c3.69,0,7.37-1.41,10.18-4.22C469.91,262.57,469.91,253.45,464.28,247.82z" />
                                </svg>
                            </button>
                            <input
                                id="goalIcon"
                                name="goalIcon"
                                type="file"
                                accept="image/png, image/jpeg, image/jpg"
                                hidden
                                onchange="goalPreviewFile()">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-y-4">
                        <input
                            type="text"
                            name="goalDescription"
                            placeholder="Name of Goal or Plan"
                            minlength="1"
                            maxlength="30"
                            class="p-3 rounded-lg border border-gray-400 tlGreen focus:outline-none"
                            required />
                        <input
                            type="number"
                            name="goalAmount"
                            placeholder="Amount to Achieve"
                            min="0"
                            step="0.01"
                            class="p-3 rounded-lg border border-gray-400 tlGreen focus:outline-none"
                            required />
                    </div>
                </div>
                <button
                    class="py-1 text-lg sm:text-xl font-semibold btGreen2 rounded-3xl"
                    type="submit"
                    name="addGoal">
                    Add to your Goals and Plans
                </button>
            </form>
        </div>
    </div>
</main>
<main id="goalUpdatePanel" class="hidden">
    <div id="goalUpdateOverlay" class="z-50 flex justify-center items-center fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50">
        <div class="flex flex-col relative justify-center text-base sm:text-lg text-gray-300 tlGreen p-8 rounded-3xl max-w-xs sm:max-w-none">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="absolute right-8 top-8 sm:top-10 justify-self-end self-center w-6 h-6 sm:w-8 sm:h-8 flex-shrink-0">
                <path fill="#d1d5db" d="M 18 2 L 15.585938 4.4140625 L 19.585938 8.4140625 L 22 6 L 18 2 z M 14.076172 5.9238281 L 3 17 L 3 21 L 7 21 L 18.076172 9.9238281 L 14.076172 5.9238281 z"></path>
            </svg>
            <form id="goalUpdateForm" method="POST" class="flex flex-col text-base" enctype="multipart/form-data">
                <input
                    id="goalUpdateDescription"
                    name="goalUpdateDescription"
                    type="text"
                    class="h-auto sm:h-11 text-left text-xl sm:text-4xl font-semibold textGray tlGreen focus:outline-none mr-8 sm:mr-10">
                <hr class="border-gray-300 mt-2 mb-5" />
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="flex items-center justify-center h-full">
                        <div class="relative">
                            <img
                                id="goalUpdatePreview"
                                src=""
                                alt="Profile"
                                class="w-28 h-28 md:w-32 md:h-32 rounded-full border-4 border-gray-400 object-cover" />
                            <button
                                type="button"
                                class="absolute bottom-1 right-1 btGreen w-8 sm:w-10 sm:text-base font-semibold p-1 rounded-3xl focus:outline-none"
                                onclick="document.getElementById('goalUpdateIcon').click()">
                                <svg
                                    viewBox="0 0 512 512"
                                    version="1.1"
                                    xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path fill="#d1d5db" class="st0" d="M307.81,212.18c-3.24,0-6.07-2.17-6.91-5.3l-4.82-17.88c-0.84-3.12-3.68-5.3-6.91-5.3h-21.46h-25.44H220.8     c-3.24,0-6.07,2.17-6.91,5.3l-4.82,17.88c-0.84,3.12-3.68,5.3-6.91,5.3H169.5c-3.96,0-7.16,3.21-7.16,7.16v101.78     c0,3.96,3.21,7.16,7.16,7.16h170.95c3.96,0,7.16-3.21,7.16-7.16V219.35c0-3.96-3.21-7.16-7.16-7.16H307.81z M282.33,264.94     c-0.86,13.64-11.93,24.71-25.58,25.58c-16.54,1.05-30.18-12.59-29.14-29.14c0.86-13.64,11.93-24.71,25.58-25.58     C269.74,234.76,283.38,248.4,282.33,264.94z" />
                                    <path fill="#d1d5db" class="st0" d="M82.95,272.41c3.82,0,7.53-1.53,10.23-4.23l21.23-21.23c4.74-4.74,6.4-11.92,3.73-18.06     c-2.73-6.29-8.88-8.95-18.84-7.57l-0.27,0.27c15.78-71.56,79.7-125.27,155.94-125.27c60.72,0,115.41,33.72,142.73,87.99     c3.58,7.11,12.24,9.97,19.34,6.39c7.11-3.58,9.97-12.24,6.39-19.34c-15.47-30.73-39.05-56.66-68.22-75.01     C325.23,77.47,290.57,67.5,254.98,67.5c-93,0-170.48,67.71-185.75,156.41c-5.38-4.77-13.59-5.18-19.13-0.44     c-6.3,5.39-6.75,14.88-1.13,20.84c0.23,0.24,5.69,6.03,11.41,11.93c3.41,3.51,6.2,6.33,8.3,8.38c4.23,4.13,7.88,7.69,14.07,7.78     C82.81,272.41,82.88,272.41,82.95,272.41z" />
                                    <path fill="#d1d5db" class="st0" d="M464.28,247.82l-26.5-26.5c-2.75-2.75-6.57-4.3-10.44-4.23c-2.33,0.03-4.29,0.56-6.07,1.42     c-0.26,0.12-0.51,0.26-0.76,0.4c-0.04,0.02-0.08,0.04-0.12,0.06c-0.59,0.33-1.16,0.68-1.69,1.08c-1.88,1.34-3.6,3.03-5.44,4.82     c-2.1,2.05-4.89,4.87-8.3,8.38c-5.72,5.9-11.18,11.68-11.41,11.93c-5.46,5.79-5.19,14.91,0.6,20.36     c5.75,5.42,14.77,5.18,20.24-0.48c-4.72,83.85-74.42,150.62-159.43,150.62c-70.52,0-131.86-45.23-152.62-112.55     c-2.35-7.6-10.41-11.86-18.01-9.52c-7.6,2.34-11.86,10.41-9.52,18.01c11.62,37.68,35.48,71.52,67.19,95.28     c32.8,24.59,71.86,37.58,112.96,37.58c100.11,0,182.23-78.45,188.14-177.1l0.79,0.79c2.81,2.81,6.5,4.22,10.18,4.22     c3.69,0,7.37-1.41,10.18-4.22C469.91,262.57,469.91,253.45,464.28,247.82z" />
                                </svg>
                            </button>
                            <input
                                id="goalUpdateIcon"
                                name="goalUpdateIcon"
                                type="file"
                                accept="image/png, image/jpeg, image/jpg"
                                hidden
                                onchange="goalUpdatePreviewFile()">
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-y-4">
                        <div>
                            <div class=" font-semibold text-lg">
                                <span>₱ </span>
                                <span id="goalUpdatePaidAmount"></span>
                                <span> / ₱</span>
                                <span id="goalUpdateAmount"></span>
                            </div>
                            <div class="w-full bg-[#064E3B] rounded-sm h-4 sm:h-6 items-center flex relative">
                                <div id="goalUpdateProgress" class="bg-[#15956B] h-4 sm:h-6 rounded-sm"></div>
                                <span id="goalUpdatePercent" class="absolute w-full text-center text-sm sm:text-base font-semibold"></span>
                            </div>
                        </div>
                        <input
                            type="number"
                            name="goalUpdatePaidAmount"
                            placeholder="Amount to Add"
                            min="0"
                            step="0.01"
                            class="p-3 rounded-lg border border-gray-400 tlGreen focus:outline-none" />
                    </div>
                    <input
                        id="goalUpdateID"
                        name="goalUpdateID"
                        type="hidden">
                    <input
                        id="goalUpdateIconPath"
                        type="hidden"
                        name="goalUpdateIconPath">
                </div>
                <div class="mt-6 grid gap-x-8 sm:gap-x-16 grid-cols-2">
                    <button
                        class=" py-1 text-base sm:text-xl font-semibold btGreen2 rounded-3xl"
                        type="submit"
                        name="goalDelete">
                        Delete
                    </button>
                    <button
                        class=" py-1 text-base sm:text-xl font-semibold btGreen2 rounded-3xl"
                        type="submit"
                        name="goalUpdate">
                        Save and Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<script>
    function goalPreviewFile() {
        const goalFileInput = document.getElementById('goalIcon');
        const goalFile = goalFileInput.files[0];

        if (goalFile) {
            const goalReader = new FileReader();

            goalReader.onload = function(e) {
                const goalImagePreview = document.getElementById('goalPreview');
                goalImagePreview.src = e.target.result;
            };

            goalReader.readAsDataURL(goalFile);
        }
    }

    function showPanelGoal() {
        document.getElementById('goalPanel').classList.remove('hidden');
    }

    document.getElementById('goalOverlay').addEventListener('click', (event) => {
        if (event.target === document.getElementById('goalOverlay')) {
            document.getElementById('goalPanel').classList.add('hidden');
        }
    });

    function goalUpdatePreviewFile() {
        const goalFileInput = document.getElementById('goalUpdateIcon');
        const goalFile = goalFileInput.files[0];

        if (goalFile) {
            const goalReader = new FileReader();

            goalReader.onload = function(e) {
                const goalImagePreview = document.getElementById('goalUpdatePreview');
                goalImagePreview.src = e.target.result;
            };

            goalReader.readAsDataURL(goalFile);
        }
    }

    function showPanelGoalUpdate(goalID, description, amount, paidAmount, groupIcon, percent) {

        document.getElementById('goalUpdateID').value = goalID;
        document.getElementById('goalUpdateDescription').value = description;
        document.getElementById('goalUpdateAmount').textContent = amount;
        document.getElementById('goalUpdatePaidAmount').textContent = paidAmount;
        document.getElementById('goalUpdateProgress').style.width = `${percent}%`;
        document.getElementById('goalUpdatePercent').textContent = `${percent}%`;
        document.getElementById('goalUpdatePreview').src = groupIcon;
        document.getElementById('goalUpdateIconPath').value = groupIcon;
        document.getElementById('goalUpdatePanel').classList.remove('hidden');
    }

    document.getElementById('goalUpdateOverlay').addEventListener('click', (event) => {
        if (event.target === document.getElementById('goalUpdateOverlay')) {
            document.getElementById('goalUpdatePanel').classList.add('hidden');
        }
    });
</script>
<?php require('partials/footer.php') ?>