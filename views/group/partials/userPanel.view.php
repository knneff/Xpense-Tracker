<?php

$tempUserID = $userInfoTemp['userid'];
$tempUsername = $userInfoTemp['username'];
$tempFirstName = $userInfoTemp['firstName'];
$tempLastName = $userInfoTemp['lastName'];
$tempUserRole = $userInfoTemp['roles'];

?>

<div class='relative'>
    <!-- user button -->
    <button onclick="<?= 'toggleUserPanel' . $tempUserID . "()" ?>" class='hover:bg-emerald-900 cursor-pointer rounded-md py-2 my-1 px-1 w-full'>
        <?php require('userIcon.view.php') ?>
    </button>

    <!-- user panel -->
    <div id='<?= 'userPanel' . $tempUserID ?>' class='z-40 hidden absolute -top-10 right-48 bgGreen rounded-xl  flex-col border-gray-600 border p-4 textGray w-56'>
        <div class='flex flex-row gap-2'>
            <?php require('userIcon.view.php') ?>
            <p class='text-sm px-1 bgGreen2 rounded-lg'><?= $tempUserRole ?></p>
        </div>
        <div class='flex flex-row gap-1 text-xl pb-2'>
            <p><?= $tempFirstName ?></p>
            <p><?= $tempLastName ?></p>
        </div>
        <hr class='border-gray-600 pb-2'>
        <form method="POST">
            <input name='kick' value='<?= $tempUserID ?>' hidden>
            <input name='role' value='<?= $tempUserRole ?>' hidden>
            <input name='group' value='<?= $_GET['id'] ?>' hidden>
            <button class='textTeal bgGreen2 rounded-md w-full'>Kick</button>
        </form>
    </div>
</div>

<script>
    function <?= 'toggleUserPanel' . $tempUserID . "()" ?> {
        document.getElementById('<?= 'userPanel' . $tempUserID ?>').classList.toggle('hidden');
        document.getElementById('<?= 'userPanel' . $tempUserID ?>').classList.toggle('flex');
    }
</script>