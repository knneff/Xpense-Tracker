<!-- Generate Invite Link Button -->
<form method='POST' action='/invite'>
    <input name='groupID' value=<?= $groupID ?> hidden>
    <button type='submit' class='flex flex-row justify-center w-full py-2 px-2 items-center gap-1 btGreen rounded-lg'>
        <svg class='size-5' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
            <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
        </svg>
        <p class='pb-1'>Generate Invite Link</p>
    </button>
</form>