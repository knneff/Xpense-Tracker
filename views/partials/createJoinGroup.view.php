<main id="createJoinGroupPanel" class="hidden fixed inset-0 justify-center items-center bg-black bg-opacity-50 transition-opacity duration-300">

    <div class="tlGreen text-gray-300 p-8 rounded-3xl shadow-lg w-11/12 max-w-md">

        <!-- Heading -->
        <h2 id="panelHeading" class="text-4xl font-semibold text-center mb-4">Create a Group</h2>

        <!-- DIVIDER -->
        <hr class="my-4 border-gray-500">

        <!-- Paragraph -->
        <p id="panelDescription" class="text-center text-gray-400 mb-6">
            Give your new group a personality with a name and an icon. You can change this anytime!
        </p>

        <!-- Form -->
        <form id="addForm" method="POST" class="space-y-4">

            <!-- Upload Icon -->
            <div id="uploadSection" class="flex flex-col items-center">
                <label for="iconUpload" class="cursor-pointer flex flex-col items-center justify-center w-24 h-24 bg-gray-700 rounded-full hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14m-7-7h14"></path>
                    </svg>
                    <span class="text-xs text-gray-400 mt-2">Upload</span>
                </label>
                <input id="iconUpload" type="file" accept="image/*" class="hidden">
            </div>

            <!-- Group Name -->
            <div id="groupNameSection">
                <input
                    type="text"
                    id="groupName"
                    name="groupName"
                    placeholder="Group Name"
                    required
                    class="w-full p-3 border rounded-lg bg-gray-700 border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Buttons -->
            <button
                id="submitBtn"
                class="w-full py-2 bg-green-800 text-white font-bold rounded-lg hover:bg-green-700"
                type="submit">
                Create Group
            </button>

            <button
                id="joinGroupBtn"
                class="w-full py-2 bg-gray-600 text-white font-bold rounded-lg hover:bg-gray-700"
                type="button"
                onclick="showJoinGroup()">
                Join Group
            </button>
        </form>

    </div>

</main>

<script>
    // Show panel
    function showGroupPanel() {
        document.getElementById('createJoinGroupPanel').classList.remove('hidden', 'opacity-0');
        document.getElementById('createJoinGroupPanel').classList.add('opacity-100');
    }

    // Close panel
    document.getElementById('createJoinGroupPanel').addEventListener('click', (event) => {
        if (event.target === document.getElementById('createJoinGroupPanel')) {
            document.getElementById('createJoinGroupPanel').classList.add('hidden');
        }
    });

    // Function to change panel content to "Join Group"
    function showJoinGroup() {
        document.getElementById('panelHeading').textContent = 'Join a Group';
        document.getElementById('panelDescription').textContent = 'Enter an invite link below to join a group.';

        // Remove upload section
        const uploadSection = document.getElementById('uploadSection');
        if (uploadSection) uploadSection.remove();

        // Update group name section
        const groupNameSection = document.getElementById('groupNameSection');
        groupNameSection.innerHTML = `
        <label for="inviteLink" class="block text-xs font-bold text-gray-400 mb-1">INVITE LINK*</label>
        <div class="relative">

            <!-- Icon -->
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M4.75 9a1.75 1.75 0 100 3.5h.55l2.8 7.3a1 1 0 001.89 0l2.8-7.3h.55a1.75 1.75 0 100-3.5h-9z"></path>
                </svg>
            </span>

            <!-- Input -->
            <input
                type="text"
                id="inviteLink"
                name="inviteLink"
                placeholder="Enter group link"
                required
                class="w-full pl-10 p-3 border rounded-lg bg-gray-700 border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>`;
        // Update buttons
        document.getElementById('submitBtn').textContent = 'Join Group';
        document.getElementById('joinGroupBtn').textContent = 'Back';
        document.getElementById('joinGroupBtn').setAttribute('onclick', 'showCreateGroup()');
    }

    // Function to revert to "Create Group"
    function showCreateGroup() {
        // Update heading and description
        document.getElementById('panelHeading').textContent = 'Create a Group';
        document.getElementById('panelDescription').textContent =
            'Give your new group a personality with a name and an icon. You can change this anytime!';

        // Restore upload section
        const uploadSection = document.createElement('div');
        uploadSection.id = 'uploadSection';
        uploadSection.className = 'flex flex-col items-center';
        uploadSection.innerHTML = `
            <label for="iconUpload" class="cursor-pointer flex flex-col items-center justify-center w-24 h-24 bg-gray-700 rounded-full hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14m-7-7h14"></path>
                </svg>
                <span class="text-xs text-gray-400 mt-2">Upload</span>
            </label>
            <input id="iconUpload" type="file" accept="image/*" class="hidden">
        `;
        document.getElementById('addForm').insertBefore(uploadSection, document.getElementById('groupNameSection'));

        // Restore group name section
        const groupNameSection = document.getElementById('groupNameSection');
        groupNameSection.innerHTML = `
            <input
                type="text"
                id="groupName"
                name="groupName"
                placeholder="Group Name"
                required
                class="w-full p-3 border rounded-lg bg-gray-700 border-gray-500 focus:outline-none focus:ring-2 focus:ring-green-500">
        `;

        // Restore buttons
        document.getElementById('submitBtn').textContent = 'Create Group';
        document.getElementById('joinGroupBtn').textContent = 'Join Group';
        document.getElementById('joinGroupBtn').setAttribute('onclick', 'showJoinGroup()');
    }
</script>