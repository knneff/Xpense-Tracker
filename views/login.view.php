<?php require('partials/headNoSide.php') ?>
<div class="grid grid-cols-1 sm:grid-cols-2 text-center items-center">

    <div class="hidden sm:inline">
        <h1 class="text-7xl text-gray-300 font-semibold">XPENSE</h1>
    </div>

    <!-- Ayaw opacity kapag ginamit yung tlGreen -->

    <div class="tlBgGreen rounded-3xl mt-8 p-8 mx-20 sm:mx-12">

        <!-- <div class="tlGreen rounded-3xl md:mx-16 p-8 bg-opacity-0 sm:mx-4 md:bg-opacity-100"> -->

        <h2 class="text-4xl font-semibold text-center textGray">Account Login</h2>
        <br>

        <hr class="border-gray-300 my-4">

        <form method="POST" action="/login" class="space-y-1">

            <label for="user"></label>
            <br>

            <input
                type="username"
                name="username"
                placeholder="Username"
                class="bg-transparent w-full p-3 border border-gray-400 textGray rounded-lg focus:outline-none"
                required>
            <br>

            <label for="pass"></label>
            <br>

            <input
                type="password"
                name="password"
                placeholder="Password"
                class="bg-transparent w-full p-3 border border-gray-400 textGray rounded-lg focus:outline-none"
                required>
            <br><br>

            <!-- ERROR MESSAGE TO NAKAHIDE KAPAG WALANG ERROR -->
            <div class="<?= isset($errorMessage) ? '' : 'hidden' ?> bg-red-400 rounded-lg text-center py-2">
                <?= $errorMessage ?>
            </div>

            <button
                type="submit"
                class="w-full py-3 mt-4 text-xl font-semibold textGray btGreen rounded-3xl">Login
            </button>

        </form>

        <br>

        <a href="/changepassword" class="textTeal hover:underline">Forgot password?</a>

        <br>
        <hr class="border-gray-300 my-4">

        <p class="text-xl text-gray-300">No account yet?
            <a href="/signup" class="textTeal hover:underline">Sign Up</a>
        </p>

    </div>
</div>

<?php require('partials/footer.php') ?>