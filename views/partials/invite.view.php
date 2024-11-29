<!-- Invite Panel -->
<div id="invitePanel" class="hidden">
    <div id="inviteOverlay" class="z-50 flex justify-center items-center fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50">
        <div class="flex justify-center text-base sm:text-lg text-gray-300 tlGreen p-8 rounded-3xl">
            <div>
                <h2 class="text-4xl font-semibold text-center textGray">Invite Links</h2>
                <hr class="my-4 border-gray-300" />
                <form method="GET" action="/gen_invite" class="flex flex-col text-base gap-5">
                    <?= isset($token) ? "<p class='bgGreen2'>$token</p>" : "<p>No Invite Link Yet..</p>" ?>
                    <input name='generate' value='generate' hidden>
                    <input name='groupID' value='<?= $groupID ?>' hidden>
                    <button type="submit" class="py-1 text-lg sm:text-xl font-semibold btGreen2 rounded-3xl">Generate Invite Link</button>
                    <!-- <div class="flex flex-row my-4 gap-4 items-center">
                        <label for="amount" class="text-2xl font-semibold">Amount: </label>
                        <input
                            type="decimal"
                            name="amountToAdd"
                            placeholder="0"
                            class="p-3 rounded-lg border border-gray-400 tlGreen focus:outline-none"
                            required />
                    </div> -->
                </form>
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