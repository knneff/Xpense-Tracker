<?php require('partials/headNoSide.php') ?>

<div class="flex flex-col gap-5 items-center justify-center">
    <div class="w-full max-w-md p-8 tlBgGreen rounded-3xl shadow-none sm:shadow-lg ">
        <h2 class="text-4xl font-semibold text-center textGray">Create an account</h2>
        <br />
        <hr class="my-4 border-gray-300" />
        <br />

        <form action="/signup" method="POST" class="space-y-6">
            <!-- FIRST AND LAST NAME -->
            <div class="flex space-x-5">
                <input
                    type="text"
                    name="firstName"
                    placeholder="First Name"
                    class="w-1/2 p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                    required />
                <input
                    type="text"
                    name="lastName"
                    placeholder="Last Name"
                    class="w-1/2 p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                    required />
            </div>
            <!-- Username -->
            <input
                type="text"
                name="username"
                placeholder="Username"
                class="w-full p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                required />
            <!-- Email -->
            <input
                type="email"
                name="email"
                placeholder="Email Address"
                class="w-full p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                required />
            <!-- Password -->
            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-full p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                required />
            <!-- Confirm Password -->
            <input
                type="password"
                name="confirmPassword"
                placeholder="Confirm Password"
                class="w-full p-3 border border-gray-400 textGray bg-transparent rounded-lg focus:outline-none"
                required />

            <!-- Submit -->
            <div>
                <!-- ERROR MESSAGE TO NAKAHIDE KAPAG WALANG ERROR -->
                <div class="<?= isset($errorMessage) ? '' : 'hidden' ?> bg-red-400 rounded-lg text-center py-2">
                    <?= $errorMessage ?>
                </div>
                <button
                    type="submit"
                    class="w-full py-3 mt-4 text-xl font-semibold textGray btGreen rounded-3xl">Next</button>
            </div>

        </form>

        <p class="mt-4 text-center textGray">
            Already have an account?
            <a href="/login" class="textTeal hover:underline">Sign In</a>
        </p>

    </div>

</div>

<?php require('partials/footer.php') ?>