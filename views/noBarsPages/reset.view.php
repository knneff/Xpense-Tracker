<?php require('views/partials/bodyNoBars.php') ?>

<div class="mt-10 flex flex-col gap-5 items-center justify-center">
    <div class="tlBgGreen w-full max-w-md p-8 rounded-3xl">
        <h2 class="text-4xl font-semibold text-center textGray">Change Password</h2>
        <br />
        <hr class="my-4 border-gray-300" />
        <br />

        <form method="POST" class="space-y-5 <?= $hide ?? '' ?>">
            <input
                id="newPassword"
                type="password"
                name="newPassword"
                value="<?= $password ?? '' ?>"
                placeholder="New Password"
                class="w-full p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                required />
            <input
                id="confirmPassword"
                type="password"
                name="confirmPassword"
                value="<?= $cPassword ?? '' ?>"
                placeholder="Confirm Password"
                class="w-full p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                required />
            <div>
                <button
                    type="submit"
                    name="changePassword"
                    class="w-full py-3 mt-4 text-xl font-semibold textGray btGreen rounded-3xl">
                    Change Password for <?= $user["username"] ?>
                </button>
            </div>
        </form>
        <?php if (isset($message)) : ?>
            <p class="text-gray-300 mt-4 text-center"><?= $message ?></p>
        <?php endif; ?>
    </div>
</div>

<?php require('views/partials/footer.php') ?>