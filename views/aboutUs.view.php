<?php require('partials/bodyNoBars.php') ?>

<section class='h-full flex flex-col justify-center gap-2 sm:gap-6 px-4 sm:px-24'>

    <!-- About Us -->
    <h1 class="text-white text-center text-3xl sm:text-4xl md:text-5xl font-extrabold text-shadow-lg leading-tight">
        About Us
    </h1>

    <!-- tiny paragraph -->
    <p class="hidden sm:flex py-4 text-base sm:text-lg font-semibold max-w-2xl mx-auto text-gray-200 leading-relaxed">
        Learn more about our mission, vision, and the team behind our platform.
    </p>

    <!-- Mission and Vision Section -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Mission and Values -->
        <div class="bg-emerald-900 text-white p-8 rounded-lg shadow-lg text-center relative">
            <h2 class="text-2xl sm:text-3xl font-bold">Mission and Values</h2>
            <p class="mt-4 max-w-2xl mx-auto text-gray-200">
                Our mission is to provide individuals with an accessible platform that empowers them to take control of their finances. By promoting simplicity, transparency, and accountability, we strive to make financial management easy and actionable. Our core values are centered around integrity, user empowerment, and innovation, ensuring that our platform is both effective and reliable for achieving financial well-being.
            </p>
        </div>

        <!-- Our Vision -->
        <div class="bg-emerald-900 text-white p-8 rounded-lg shadow-lg text-center relative">
            <h2 class="text-2xl sm:text-3xl font-bold">Our Vision</h2>
            <p class="mt-4 max-w-2xl mx-auto text-gray-200">
                To become the leading digital solution for personal finance management, inspiring financial literacy and discipline worldwide. We envision a world where individuals confidently manage their expenses, achieve financial independence, and enjoy a sustainable, balanced lifestyle.
            </p>
        </div>
    </section>

</section>

<!-- Our Team -->
<section class="bgGreen2 flex flex-col text-white py-8 px-4 sm:px-44 gap-4">

    <h2 class="text-4xl font-bold text-center">Our Team</h2>
    <p class="text-lg text-center text-gray-200">
        Meet the talented individuals behind our platform, each bringing their expertise to drive innovation in financial management.
    </p>

    <!-- Team Leaders Section (ROW) -->
    <div class="text-center flex flex-col sm:flex-row justify-between gap-4">
        <!-- Team Leader -->
        <div class="flex-1 bgGreen p-4 rounded-2xl transform transition-transform duration-300 hover:scale-105">
            <div class="flex flex-col justify-center">
                <!-- Title -->
                <h3 class="text-3xl font-bold text-gray-200 mb-2">Team Leader</h3>
                <!-- Manager 1 -->
                <div class="text-center">
                    <img class="w-40 h-40 mx-auto rounded-full border-4 border-green-800 object-cover shadow-lg hover:shadow-xl transition-shadow duration-300" src="team-leader2.jpg" alt="Kota">
                    <h3 class="mt-4 text-xl font-bold text-green-400">Kota</h3>
                    <p class="mt-2 text-gray-400 text-lg">UI</p>
                    <div class="mt-4 flex justify-center flex-col space-y-2">
                        <!-- Email -->
                        <div class="flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:skibidi@company.com" class="text-gray-400 hover:text-green-400">skibidi@company.com</a>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">+1 (234) 567-890</a>
                        </div>

                        <!-- GitHub -->
                        <div class="flex items-center justify-center space-x-2">
                            <a href="https://github.com/skibidi" rel="noreferrer" target="_blank" class="text-teal-700 transition hover:text-teal-700/75 dark:text-teal-500 dark:hover:text-teal-500/75">
                                <span class="sr-only">GitHub</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">skbidi.com</a>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Managers -->
        <div class="bgGreen round p-4 rounded-2xl text-center">
            <h3 class="text-3xl font-bold text-gray-200 mb-2">Team Managers</h3>
            <div class="flex justify-between gap-16 flex-wrap">
                <!-- Manager 1 -->
                <div class="text-center m-0 transform transition-transform duration-300 hover:scale-105">
                    <img class="w-40 h-40 mx-auto rounded-full border-4 border-green-800 object-cover shadow-lg hover:shadow-xl transition-shadow duration-300" src="team-leader2.jpg" alt="Kota">
                    <h3 class="mt-4 text-xl font-bold text-green-400">Kota</h3>
                    <p class="mt-2 text-gray-400 text-lg">UI</p>
                    <div class="mt-4 flex justify-center flex-col space-y-2">
                        <!-- Email -->
                        <div class="flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:skibidi@company.com" class="text-gray-400 hover:text-green-400">skibidi@company.com</a>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">+1 (234) 567-890</a>
                        </div>

                        <!-- GitHub -->
                        <div class="flex items-center justify-center space-x-2">
                            <a href="https://github.com/skibidi" rel="noreferrer" target="_blank" class="text-teal-700 transition hover:text-teal-700/75 dark:text-teal-500 dark:hover:text-teal-500/75">
                                <span class="sr-only">GitHub</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">skbidi.com</a>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Manager 2 -->
                <div class="text-center m-0 transform transition-transform duration-300 hover:scale-105">
                    <img class="w-40 h-40 mx-auto rounded-full border-4 border-green-800 object-cover shadow-lg hover:shadow-xl transition-shadow duration-300" src="team-leader3.jpg" alt="Gorian">
                    <h3 class="mt-4 text-xl font-bold text-green-400">Gorian</h3>
                    <p class="mt-2 text-gray-400 text-lg">UI</p>
                    <div class="mt-4 flex justify-center flex-col space-y-2">
                        <!-- Email -->
                        <div class="flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:skibidi@company.com" class="text-gray-400 hover:text-green-400">skibidi@company.com</a>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">+1 (234) 567-890</a>
                        </div>

                        <!-- GitHub -->
                        <div class="flex items-center justify-center space-x-2">
                            <a href="https://github.com/skibidi" rel="noreferrer" target="_blank" class="text-teal-700 transition hover:text-teal-700/75 dark:text-teal-500 dark:hover:text-teal-500/75">
                                <span class="sr-only">GitHub</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">skbidi.com</a>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Manager 3 -->
                <div class="text-center m-0 transform transition-transform duration-300 hover:scale-105">
                    <img class="w-40 h-40 mx-auto rounded-full border-4 border-green-800 object-cover shadow-lg hover:shadow-xl transition-shadow duration-300" src="team-leader4.jpg" alt="Mokujin">
                    <h3 class="mt-4 text-xl font-bold text-green-400">Mokujin</h3>
                    <p class="mt-2 text-gray-400 text-lg">UI</p>
                    <div class="mt-4 flex justify-center flex-col space-y-2">
                        <!-- Email -->
                        <div class="flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:skibidi@company.com" class="text-gray-400 hover:text-green-400">skibidi@company.com</a>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">+1 (234) 567-890</a>
                        </div>

                        <!-- GitHub -->
                        <div class="flex items-center justify-center space-x-2">
                            <a href="https://github.com/skibidi" rel="noreferrer" target="_blank" class="text-teal-700 transition hover:text-teal-700/75 dark:text-teal-500 dark:hover:text-teal-500/75">
                                <span class="sr-only">GitHub</span>
                                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">skbidi.com</a>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- OTHERS -->
    <div class='flex flex-row flex-wrap justify-between gap-4'>
        <!-- Developer 1 -->
        <div class="bgGreen gap-2 p-2 rounded-xl flex flex-row transform transition-transform duration-300 hover:scale-105">
            <!-- IMAGE -->
            <img class="w-40 h-40 rounded-full border-4 border-green-800 object-cover shadow-lg hover:shadow-xl transition-shadow duration-300" src="team-member8.jpg" alt="Max">
            <!-- INFO -->
            <div class='flex flex-col justify-start'>
                <!-- Name -->
                <h3 class="mt-2 text-xl font-bold text-green-400">Max</h3>
                <!-- Role -->
                <p class="text-gray-400 text-lg">UI</p>
                <!-- Email -->
                <div class="mt-2 flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <a href="mailto:skibidi@company.com" class="text-gray-400 hover:text-green-400">skibidi@company.com</a>
                </div>
                <!-- Phone -->
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">+1 (234) 567-890</a>
                </div>
                <!-- GitHub -->
                <div class="flex gap-2">
                    <a href="https://github.com/skibidi" rel="noreferrer" target="_blank" class="text-teal-700 transition hover:text-teal-700/75 dark:text-teal-500 dark:hover:text-teal-500/75">
                        <span class="sr-only">GitHub</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                        <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">skbidi.com</a>
                    </a>
                </div>
            </div>
        </div>
        <!-- Developer 2 -->
        <div class="bgGreen gap-2 p-2 rounded-xl flex flex-row transform transition-transform duration-300 hover:scale-105">
            <!-- IMAGE -->
            <img class="w-40 h-40 rounded-full border-4 border-green-800 object-cover shadow-lg hover:shadow-xl transition-shadow duration-300" src="team-member8.jpg" alt="Max">
            <!-- INFO -->
            <div class='flex flex-col justify-start'>
                <!-- Name -->
                <h3 class="mt-2 text-xl font-bold text-green-400">Max</h3>
                <!-- Role -->
                <p class="text-gray-400 text-lg">UI</p>
                <!-- Email -->
                <div class="mt-2 flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <a href="mailto:skibidi@company.com" class="text-gray-400 hover:text-green-400">skibidi@company.com</a>
                </div>
                <!-- Phone -->
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">+1 (234) 567-890</a>
                </div>
                <!-- GitHub -->
                <div class="flex gap-2">
                    <a href="https://github.com/skibidi" rel="noreferrer" target="_blank" class="text-teal-700 transition hover:text-teal-700/75 dark:text-teal-500 dark:hover:text-teal-500/75">
                        <span class="sr-only">GitHub</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                        <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">skbidi.com</a>
                    </a>
                </div>
            </div>
        </div>
        <!-- Developer 3 -->
        <div class="bgGreen gap-2 p-2 rounded-xl flex flex-row transform transition-transform duration-300 hover:scale-105">
            <!-- IMAGE -->
            <img class="w-40 h-40 rounded-full border-4 border-green-800 object-cover shadow-lg hover:shadow-xl transition-shadow duration-300" src="team-member8.jpg" alt="Max">
            <!-- INFO -->
            <div class='flex flex-col justify-start'>
                <!-- Name -->
                <h3 class="mt-2 text-xl font-bold text-green-400">Max</h3>
                <!-- Role -->
                <p class="text-gray-400 text-lg">UI</p>
                <!-- Email -->
                <div class="mt-2 flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <a href="mailto:skibidi@company.com" class="text-gray-400 hover:text-green-400">skibidi@company.com</a>
                </div>
                <!-- Phone -->
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">+1 (234) 567-890</a>
                </div>
                <!-- GitHub -->
                <div class="flex gap-2">
                    <a href="https://github.com/skibidi" rel="noreferrer" target="_blank" class="text-teal-700 transition hover:text-teal-700/75 dark:text-teal-500 dark:hover:text-teal-500/75">
                        <span class="sr-only">GitHub</span>
                        <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                        <a href="tel:+1234567890" class="text-gray-400 hover:text-green-400">skbidi.com</a>
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Our Financial Management Specialties -->
<section class="py-12 bgGreen text-white">
    <div class="text-center max-w-5xl mx-auto">
        <h2 class="text-3xl sm:text-4xl font-bold">Our Financial Management Specialties</h2>
        <p class="mt-4 text-lg text-gray-200">
            Explore the core specialties that define our platform and empower users to take charge of their finances.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mt-8">
            <!-- Specialties Container -->
            <div class="p-6 bg-emerald-900 text-center text-white rounded-lg hover:scale-105 transition transform shadow-lg">
                <i class="fas fa-wallet text-4xl text-green-600"></i>
                <h3 class="text-xl font-bold mt-4">Expense <br>Tracking</h3>
                <p class="mt-4 text-sm text-gray-300">
                    Track and manage your expenses in real time for complete financial visibility.
                </p>
            </div>

            <div class="p-6 bg-emerald-900 text-center text-white rounded-lg hover:scale-105 transition transform shadow-lg">
                <i class="fas fa-calendar-alt text-4xl text-green-600"></i>
                <h3 class="text-xl font-bold mt-4">Budget Management</h3>
                <p class="mt-4 text-sm text-gray-300">
                    Plan and manage your budget efficiently to stay on top of your financial goals.
                </p>
            </div>

            <div class="p-6 bg-emerald-900 text-center text-white rounded-lg hover:scale-105 transition transform shadow-lg">
                <i class="fas fa-chart-line text-4xl text-green-600"></i>
                <h3 class="text-xl font-bold mt-4">Financial <br>Insights</h3>
                <p class="mt-4 text-sm text-gray-300">
                    Gain valuable insights into your spending habits and make data-driven financial decisions.
                </p>
            </div>

            <div class="p-6 bg-emerald-900 text-center text-white rounded-lg hover:scale-105 transition transform shadow-lg">
                <i class="fas fa-bullseye text-4xl text-green-600"></i>
                <h3 class="text-xl font-bold mt-4">Goal Setting and Achievement</h3>
                <p class="mt-4 text-sm text-gray-300">
                    Set financial goals and track your progress to achieve your financial independence.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bgGreen py-12 relative">
    <div class="text-center max-w-5xl mx-auto text-gray-200">
        <h2 class="text-3xl sm:text-4xl font-bold">State-of-the-Art Technology</h2>
        <p class="mt-4 text-lg">
            Experience the cutting-edge technology that powers our platform and enables smarter financial management.
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
            <!-- Expense Monitoring -->
            <div class="p-6 bg-emerald-900 text-gray-200 rounded-lg hover:scale-105 transition transform shadow-lg">
                <h3 class="text-xl font-bold mt-4">Expense Monitoring</h3>
                <p class="mt-2">Provides users with an intuitive system to track and manage their expenses in real time, ensuring complete financial visibility.</p>
            </div>
            <!-- Progressive Web App -->
            <div class="p-6 bg-emerald-900 text-gray-200 rounded-lg hover:scale-105 transition transform shadow-lg">
                <h3 class="text-xl font-bold mt-4">Progressive Web App (PWA)</h3>
                <p class="mt-2">Offers a seamless and responsive experience that works across all devices, combining the best of web and mobile applications for easy accessibility.</p>
            </div>
            <!-- Advanced Tracking -->
            <div class="p-6 bg-emerald-900 text-gray-200 rounded-lg hover:scale-105 transition transform shadow-lg">
                <h3 class="text-xl font-bold mt-4">Advanced Tracking</h3>
                <p class="mt-2">Features sophisticated tools to categorize, analyze, and monitor spending habits, helping users make data-driven financial decisions.</p>
            </div>
            <!-- Community Shared Expense -->
            <div class="p-6 bg-emerald-900 text-gray-200 rounded-lg hover:scale-105 transition transform shadow-lg">
                <h3 class="text-xl font-bold mt-4">Community Shared Expense</h3>
                <p class="mt-2">Enables groups to track and manage shared expenses effortlessly, ensuring transparency and accountability in collaborative financial activities.</p>
            </div>
        </div>
    </div>
</section>




<!-- Footer -->
<footer class="bg-emerald-900 text-white text-center py-6">
    <p>&copy; 2024-2025 Xpense Tracker. All rights reserved.</p>
</footer>

<?php require('partials/footer.php') ?>