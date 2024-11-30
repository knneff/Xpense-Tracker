<button
    id="buttonNotif"
    class="hover:scale-105">
    <div
        class="grid items-center textGray h-5/6 w-9 sm:w-10">
        <div
            id="notifCountDisplay"
            class="<?= $count['unviewed'] ? 'bg-gray-300' : 'hidden'; ?> text-xs scale-50 sm:scale-75 w-7 py-1 absolute justify-self-end self-start  text-gray-700 font-semibold rounded-full">
            <?= $count['unviewed'] ?>
        </div>
        <svg class="size-7 sm:size-8 text-gray" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
        </svg>
    </div>
</button>
<div id="panelNotif" class="hidden absolute z-40 top-16 right-10 mt-2 w-60 sm:w-80 rounded-md py-2 pl-2 sm:py-4 sm:pl-4 tlGreen shadow-lg text-gray-200">
    <div class="flex justify-between mb-2 pr-4">
        <div class="text-xl sm:text-2xl font-semibold">
            Notifications
        </div>
        <div class="text-sm sm:text-base self-end hover:text-white">
            <form method="POST">
                <button
                    name="deleteNotif"
                    type="submit"
                    class="hover:underline">
                    Clear All
                </button>
            </form>
        </div>
    </div>
    <div class="scrollbar-custom max-h-96 overflow-auto gap-2 grid">
        <?php foreach ($notifications as $notification) : ?>
            <div class="<?= $notification['isViewed'] ? 'bgGreen' : 'bg-emerald-900'; ?> notifPanel mr-2 sm:mr-4 p-2 rounded-md">
                <div class="font-semibold text-base sm:text-lg">
                    <?= $notification['title'] ?>
                </div>
                <div class="text-sm sm:text-base">
                    <?= $notification['body'] ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<script>
    let isNotifDisplayed = false;
    const buttonNotif = document.querySelector("#buttonNotif");
    const panelNotif = document.querySelector("#panelNotif");

    buttonNotif.addEventListener("click", function(event) {
        event.stopPropagation();
        panelNotif.classList.remove("hidden");
        isNotifDisplayed = true;
    });

    document.addEventListener("click", function(event) {
        if (!panelNotif.contains(event.target) && event.target !== buttonNotif && isNotifDisplayed) {
            panelNotif.classList.add("hidden");
            document.getElementById("notifCountDisplay").classList.add("hidden");

            document.querySelectorAll('.notifPanel').forEach(panel => {
                panel.classList.add('bgGreen');
                panel.classList.remove('bg-emerald-900');
            });
            <?php $_SESSION['isViewed'] = true; ?>
            isNotifDisplayed = false;
        }
    });
</script>