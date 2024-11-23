<?php require('partials/head.php') ?>
<div class="flex flex-col gap-5 items-center justify-center">
    <div class="w-full max-w-3xl p-8 pt-0 sm:pt-8 tlBgGreen rounded-3xl shadow-none sm:shadow-lg ">
        <form method="POST" class="flex flex-col" enctype="multipart/form-data">
            <div class="text-gray-300 text-base sm:text-lg grid grid-cols-1 sm:grid-cols-2">
                <div class="flex flex-row sm:flex-col items-center justify-center h-full gap-5 mb-16 sm:mb-0">
                    <img
                        id="profileImage"
                        src="<?= $userInfo['userIcon'] ?>"
                        alt="Profile"
                        class="w-28 h-28 md:w-36 md:h-36 rounded-full border-4 border-gray-400 object-cover" />
                    <input
                        id="icon"
                        name="icon"
                        type="file"
                        accept="image/png, image/jpeg, image/jpg"
                        hidden
                        onchange="previewFile()">
                    <button
                        type="button"
                        class="btGreen text-xs sm:text-base font-semibold py-2 px-5 rounded-3xl focus:outline-none"
                        onclick="document.getElementById('icon').click()">
                        Change Profile
                    </button>
                </div>
                <div class="space-y-4">
                    <div class="flex space-x-5">
                        <div>
                            <label for="firstname" class="text-lg">First Name</label>
                            <input
                                type="text"
                                name="firstName"
                                class="w-full p-1 sm:p-2 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                                value="<?= $userInfo['firstname'] ?>"
                                required />
                        </div>
                        <div>
                            <label for="lastname" class="text-lg">Last Name</label>
                            <input
                                type="text"
                                name="lastName"
                                class="w-full p-1 sm:p-2 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                                value="<?= $userInfo['lastname'] ?>"
                                required />
                        </div>
                    </div>
                    <div>
                        <label for="username" class="text-lg">Username</label>
                        <input
                            type="text"
                            name="username"
                            class="w-full p-1 sm:p-2 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                            value="<?= $userInfo['username'] ?>"
                            required />
                    </div>

                    <div>
                        <label for="email" class="text-lg">Email Address</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="w-full p-1 sm:p-2 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                            value="<?= $userInfo['email'] ?>"
                            required />
                    </div>
                </div>
            </div>
            <div class="flex justify-center space-x-5">
                <button
                    type="button"
                    onclick="window.location.reload()"
                    class="py-2 mt-8 w-full sm:w-1/3 text-base sm:text-xl self-center font-semibold textGray btGreen rounded-3xl">
                    Revert Changes
                </button>
                <button
                    type="submit"
                    name="changeProfile"
                    class="py-2 mt-8 w-full sm:w-1/3 text-base sm:text-xl self-center font-semibold textGray btGreen rounded-3xl">
                    Save Changes
                </button>
            </div>
            <p class="mt-2 text-base sm:text-lg text-center textGray">
                Change your Password?
                <a href="/changepassword" class="textTeal hover:underline">Reset here</a>
            </p>
            <?php if (isset($message)) : ?>
                <p class="text-gray-300 mt-4 text-center"><?= $message ?></p>
            <?php endif; ?>
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