<nav class="sticky top-0 tlGreen z-40 w-full shadow-lg">
    <!-- NAVBAR CONTENT -->
    <div class="flex px-2 sm:px-6 lg:px-8 h-16 justify-between items-center">
        <!-- NAV Left -->
        <div>
            <!-- Image Logo -->
            <a href='/'>
                <img class="h-10 w-auto" src="/assets/twitter-logo.jpg"
                    alt="Your Company">
            </a>
        </div>

        <!-- NAV Center -->
        <div class="flex-1 text-center">
            <h1 class="ml-5 text-2xl font-bold text-gray-100">Expense Tracker</h1>
        </div>

        <!-- NAV Right -->
        <div class="relative ml-3">
            <div>
                <button type="button"
                    class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    id="toggleButton" aria-expanded=" false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="h-12 w-12 rounded-full object-cover"
                        src="<?= $_SESSION['userIcon'] ?>"
                        alt="">
                </button>
            </div>
            <div id="targetDiv" class="hidden absolute z-50 right-0 mt-2 w-48 origin-top-right rounded-md py-2 tlGreen shadow-lg border border-gray-800">
                <a href="/usersettings" class="hover:bg-emerald-900 block px-4 py-2 text-sm text-gray-300">Your Profile</a>
                <a href="#" class="hover:bg-emerald-900 block px-4 py-2 text-sm text-gray-300">Settings</a>
                <a href="/logout" class="hover:bg-emerald-900 block px-4 py-2 text-sm text-gray-300">Sign out</a>
            </div>
        </div>
    </div>
</nav>
<script>
    const button = document.querySelector("#toggleButton");
    const targetDiv = document.querySelector("#targetDiv");

    button.addEventListener("click", function(event) {
        event.stopPropagation();
        targetDiv.classList.toggle("hidden");
    });

    document.addEventListener("click", function(event) {
        if (!targetDiv.contains(event.target) && event.target !== button) {
            targetDiv.classList.add("hidden");
        }
    });
</script>