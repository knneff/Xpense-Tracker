<?php require('partials/head.php') ?>

<main>
    <!-- Username -->
    <h1 class="my-10 px-2 py-0 sm:text-4xl lg:text-6xl font-bold text-gray-300 flex justify-center items-center">GOALS AND PLANS</h1>
    <div>
        <!-- Grid Container for Goals -->
        <div id="goal-container" class="grid sm:grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- Add Button as the first div inside the grid container -->
            <button
                onclick="addGoal()"
                class="text-white text-2xl p-6 space-y-4 rounded-lg text-center border-dashed border-2 mx-12 my-4">
                +
            </button>
        </div>
    </div>

    <script>
        function addGoal() {
            // Main container div
            const mainDiv = document.createElement('div');
            mainDiv.className = 'p-6 rounded-3xl border-gray border-2 space-y-4 mx-12 my-4';

            // Top row container (flex container for the two top divs)
            const topRow = document.createElement('div');
            topRow.className = 'flex space-x-4';

            // Top left div
            const topLeftDiv = document.createElement('div');
            topLeftDiv.className = 'flex-1 text-white text-left';
            topLeftDiv.textContent = 'Top Left';

            // Top right div with input
            const topRightDiv = document.createElement('div');
            topRightDiv.className = 'flex-1 text-white rounded-lg text-right';

            // Input to enter progress value in the top right div
            const progressInput = document.createElement('input');
            progressInput.type = 'number';
            progressInput.placeholder = 'Enter progress (0-100)';
            progressInput.className = 'w-full p-2 text-black rounded-lg';
            progressInput.oninput = updateProgress;

            // Append input to the top right div
            topRightDiv.appendChild(progressInput);

            // Append the two top divs to the top row
            topRow.appendChild(topLeftDiv);
            topRow.appendChild(topRightDiv);

            // Bottom center div with progress bar
            const bottomDiv = document.createElement('div');
            bottomDiv.className = 'text-center';

            // Progress Bar Container
            const progressBarContainer = document.createElement('div');
            progressBarContainer.className = 'w-full bg-[#1D5C51] rounded-full h-8 mb-4 relative';

            // Progress Bar Fill
            const progressBar = document.createElement('div');
            progressBar.className = 'bg-[#18936E] h-8 rounded-full text-center text-white';
            progressBar.style.width = '5%';

            // Percentage Label
            const percentageLabel = document.createElement('div');
            percentageLabel.className = 'absolute inset-0 flex items-center justify-center text-white font-bold';
            percentageLabel.textContent = '0%';

            // Append progress bar and label to the container
            progressBarContainer.appendChild(progressBar);
            progressBarContainer.appendChild(percentageLabel);

            // Append progress bar container to bottom div
            bottomDiv.appendChild(progressBarContainer);

            // Append top row and bottom div to main div
            mainDiv.appendChild(topRow);
            mainDiv.appendChild(bottomDiv);

            // Append main div to the container in the HTML
            document.getElementById('goal-container').appendChild(mainDiv);

            // Function to update the progress bar and percentage label based on input value
            function updateProgress() {
                const value = parseInt(progressInput.value) || 0;
                const progress = Math.max(5, Math.min(100, value)); // Clamp between 5 and 100
                progressBar.style.width = progress + '%';
                percentageLabel.textContent = value + '%'; // Update percentage label
            }
        }
    </script>
</main>

<?php require('partials/footer.php') ?>