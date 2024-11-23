<?php require('partials/headNoSide.php') ?>

<main class="grid place-items-center bgGreen px-4 py-24 sm:py-32 lg:px-8">
    <div class="text-center py-6 px-8 sm:py-10 sm:px-16 tlGreen rounded-xl">
        <p class="text-sm sm:text-lg font-semibold textGray">404</p>
        <h1 class="mt-4 sm:mt-6 text-balance text-3xl sm:text-5xl font-semibold tracking-tight textGray">Page not found</h1>
        <p class="mt-4 sm:mt-6 text-pretty text-xs sm:text-lg font-medium textGray">Sorry, we couldn’t find the page you’re looking for.</p>
        <div class="mt-6 sm:mt-10 flex items-center justify-center gap-x-6">
            <a href="/dashboard" class="btGreen hover:bg-emerald-700 rounded-3xl px-3.5 py-2.5 text-xs sm:text-lg font-semibold textGray focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">Go back home</a>
            <a href="#" class="text-xs sm:text-lg font-semibold textTeal">Contact support <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</main>

<?php require('partials/footer.php') ?>