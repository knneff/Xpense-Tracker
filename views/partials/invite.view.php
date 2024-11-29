<!-- Invite Panel -->
<div id="invitePanel" class="hidden">
    <div id="inviteOverlay" class="z-50 flex justify-center items-center fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50">
        <div class="flex justify-center text-base sm:text-lg text-gray-300 tlGreen p-8 rounded-3xl">
            <div>
                <h2 class="text-4xl font-semibold text-center textGray">Invite Links</h2>
                <hr class="my-4 border-gray-300" />
                <div class="flex flex-col text-base">
                    <p class="text-2xl font-semibold">Token:</p>
                    <p> <?= $groupTokenHash ?> </p>
                </div>
                <br>
                <div class="flex flex-col text-base">
                    <p class="text-2xl font-semibold">Link:</p>
                    <p> <?= "<a href='/shared?inviteToken={$groupTokenHash}' class='textTeal hover:underline'> --> Copy This Link <-- </a>" ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Behaviour -->
<script>
    function showInvite() {
        document.getElementById('invitePanel').classList.remove('hidden');
    }

    document.getElementById('inviteOverlay').addEventListener('click', (event) => {
        if (event.target === document.getElementById('inviteOverlay')) {
            document.getElementById('invitePanel').classList.add('hidden');
        }
    });
</script>