<?php require('partials/body.php') ?>

<div class="flex flex-col gap-5 items-center justify-center">
    <div class="w-full max-w-3xl p-8 pt-0 sm:pt-8 tlBgGreen rounded-3xl">
        <?php if (isset($message)) : ?>
            <p class="text-white text-center bg-emerald-900 rounded-3xl font-semibold p-2 mb-2">
                <?= $message ?>
            </p>
        <?php endif; ?>
        <form method="POST" class="flex flex-col" enctype="multipart/form-data">
            <!-- UPPER FIELD PANELS -->
            <div class="text-gray-300 text-base sm:text-lg grid grid-cols-1 sm:grid-cols-2">
                <!-- User Icon (LEFT PANEL) -->
                <div class="flex flex-row sm:flex-col items-center justify-center h-full gap-5 mb-16 sm:mb-0">
                    <div class="relative">
                        <img
                            id="profileImage"
                            src="<?= $userInfo['userIcon'] ?? "assets/icons/user/_default.png" ?>"
                            class="w-28 h-28 md:w-36 md:h-36 rounded-full border-4 border-gray-400 object-cover" />
                        <button
                            type="button"
                            class="absolute bottom-1 right-1 btGreen w-8 sm:w-10 sm:text-base font-semibold p-1 rounded-3xl focus:outline-none"
                            onclick="document.getElementById('icon').click()">
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
                    </div>
                    <input
                        id="icon"
                        name="icon"
                        type="file"
                        accept="image/png, image/jpeg, image/jpg"
                        hidden
                        onchange="previewFile()">

                </div>

                <!-- RIGHT PANEL -->
                <div class="space-y-4">
                    <!-- FIRST AND LAST NAME FIELD -->
                    <div class="flex space-x-5">
                        <div>
                            <label for="firstname" class="text-lg">First Name</label>
                            <input
                                type="text"
                                name="firstName"
                                minlength="1"
                                maxlength="20"
                                class="w-full p-1 sm:p-2 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                                value="<?= $firstname ?? $userInfo['firstname'] ?>"
                                required />
                        </div>
                        <div>
                            <label for="lastname" class="text-lg">Last Name</label>
                            <input
                                type="text"
                                name="lastName"
                                minlength="1"
                                maxlength="20"
                                class="w-full p-1 sm:p-2 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                                value="<?= $lastname ?? $userInfo['lastname'] ?>"
                                required />
                        </div>
                    </div>

                    <!-- USERNAME -->
                    <div>
                        <label for="username" class="text-lg">Username</label>
                        <input
                            type="text"
                            name="username"
                            minlength="1"
                            maxlength="20"
                            class="w-full p-1 sm:p-2 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                            value="<?= $username ?? $userInfo['username'] ?>"
                            required />
                    </div>

                    <!-- EMAIL -->
                    <div>
                        <label for="email" class="text-lg">Email Address</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="w-full p-1 sm:p-2 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                            value="<?= $email ?? $userInfo['email'] ?>"
                            required />
                    </div>
                    <input
                        value="<?= $userInfo['email'] ?>"
                        name="currentEmail"
                        type="hidden">
                    <input
                        value="<?= $userInfo['username'] ?>"
                        name="currentUsername"
                        type="hidden">
                </div>
            </div>

            <!-- REVERT and SAVE BUTTON -->
            <div class="flex justify-between space-x-5">

                <button
                    type="button"
                    class="py-1 mt-8 w-full sm:w-1/3 text-base sm:text-lg self-center font-semibold textGray border-2 border-gray-300 rounded-3xl active:scale-95 transition-transform">
                    <a href="/usersettings">
                        Revert Changes
                    </a>
                </button>

                <button
                    type="submit"
                    name="changeProfile"
                    class="py-1 mt-8 w-full sm:w-1/3 text-base sm:text-lg self-center font-semibold textGray btGreen rounded-3xl">
                    Save Changes
                </button>
            </div>

            <!-- CHANGE PASSWORD -->
            <p class="mt-2 text-base sm:text-lg text-center textGray">
                Change your Password?
                <a href="/changepassword" class="textTeal hover:underline">Reset here</a>
            </p>
        </form>
    </div>
</div>

<script>
    function previewFile() {
        const fileInput = document.getElementById('icon');
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('profileImage');
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }
</script>

<?php require('partials/footer.php') ?>