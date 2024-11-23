<?php require('partials/headNoSide.php') ?>

<div class="mt-10 flex flex-col gap-5 items-center justify-center">
    <div class="tlBgGreen w-full max-w-md p-8 rounded-3xl">
        <a href="javascript:history.back()" class="justify-start textTeal hover:underline">Go Back</a>
        <br />
        <br />
        <h2 class="text-4xl font-semibold text-center textGray">Forgot Password</h2>
        <br />
        <hr class="my-4 border-gray-300" />
        <br />

        <form method="POST" class="space-y-3">
            <label
                class="text-sm font-semibold textGray"
                for="email">
                Enter your e-mail address to reset your password
            </label>
            <input
                id="email"
                type="email"
                name="email"
                placeholder="Email Address"
                class="w-full p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                required />
            <div>
                <button
                    type="submit"
                    name="forgotPassword"
                    class="w-full py-3 mt-4 text-xl font-semibold textGray btGreen rounded-3xl">
                    Send
                </button>
            </div>
        </form>
        <?php if (isset($message)) : ?>
            <p class="text-gray-300 mt-4 text-center"><?= $message ?></p>
        <?php endif; ?>
    </div>
</div>

<?php require('partials/footer.php') ?>