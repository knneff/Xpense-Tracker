<?php

$tempExpenseID = $currUserPending['expenseID'];
$tempSubscriptionID = $currUserPending['subscriptionID'];
$tempDescription = $currUserPending['description'];
$tempExpenseTime = formatDateTime($currUserPending['expenseTime']);
$tempCategory = $currUserPending['category'];
foreach ($categories as $index => $value) {
    if ($tempCategory === $value['label']) {
        $tempCategoryColor = $value['color'];
        break;
    } else {
        $tempCategoryColor = $categories['others']['color'];
    }
}
$tempExpenseType = $currUserPending['expenseType'];
$tempAmount = $currUserPending['amount'];

?>

<!-- Pending Expense Card -->
<div class='flex-1 textGray rounded-lg border border-gray-400'>

    <!-- title (description, dateTime) -->
    <div class='flex justify-between items-center rounded-t-lg bgGreen2 px-2 py-1'>
        <div class='flex flex-row items-center gap-1'>
            <h2 class='text-xl font-semibold' id='description'> <?= stringShortener($tempDescription, 15) ?> </h2>
            <p class='text-sm text-white bg-[<?= $tempCategoryColor ?>] rounded-lg px-1'> <?= $tempCategory ?> </p>
        </div>
        <p class='text-lg'> <?= $tempExpenseTime ?> </p>
    </div>

    <!-- body (category, expenseType, amount) -->
    <div class='flex flex-row justify-between items-center px-4 py-4 bgGreen rounded-b-lg'>
        <!-- right -->
        <p class='text-2xl' id='amount'> ₱ <?= $tempAmount ?> </p>
        <!-- left -->
        <div class='flex flex-col items-end gap-2'>
            <div class='flex flex-row gap-2'>
                <button onclick="<?= 'showDeclinePanel' . $index . '()' ?>" class='btRed px-2 py-1 text-lg rounded-lg w-24'>Decline</button>
                <button onclick="<?= 'showAcceptPanel' . $index . '()' ?>" class='btGreen px-2 py-1 text-lg rounded-lg w-24'>Accept</button>
            </div>
        </div>

    </div>
</div>

<!-- ACCEPT PANEL AND OVERLAY -->
<div id='<?= 'acceptPanel' . $index ?>' class='hidden z-50 fixed top-0 left-0'>
    <div id='<?= 'acceptOverlay' . $index ?>' class='w-screen h-screen bg-black bg-opacity-50 flex justify-center items-center'>
        <div class='bgGreen flex flex-col opacity-100 p-8 rounded-3xl textGray'>
            <h2 class="text-4xl font-semibold text-center">Accept Payment</h2>
            <hr class="my-4 border-gray-300" />
            <p class='text-base text-center'>Accept payment for <b><i><?= $tempDescription ?></i></b>?</p>
            <form method="POST" action="" class="flex flex-col text-base gap-5">
                <input name='acceptPending' value='<?= $userID ?>' hidden>
                <input name='desc' value='<?= $tempDescription ?>' hidden>
                <input name='category' value='<?= $tempCategory ?>' hidden>
                <input name='type' value='<?= $tempExpenseType ?>' hidden>
                <input name='amount' value='<?= $tempAmount ?>' hidden>
                <input name='expenseID' value='<?= $tempExpenseID ?>' hidden>
                <input name='subscriptionID' value='<?= $tempSubscriptionID ?>' hidden>
                <button type="submit" class="py-1 mt-4 text-lg sm:text-xl font-semibold btGreen2 rounded-3xl">Pay $<?= $tempAmount ?> </button>
            </form>
        </div>
    </div>
</div>

<!-- DECLINE PANEL AND OVERLAY -->
<div id='<?= 'declinePanel' . $index ?>' class='hidden z-50 fixed top-0 left-0'>
    <div id='<?= 'declineOverlay' . $index ?>' class='w-screen h-screen bg-black bg-opacity-50 flex justify-center items-center'>
        <div class='bgGreen flex flex-col opacity-100 p-8 rounded-3xl textGray'>
            <h2 class="text-4xl font-semibold text-center">Decline Payment</h2>
            <hr class="my-4 border-gray-300" />
            <p class='text-base text-center'>Decline payment for <b><i><?= $tempDescription ?></i></b>?</p>
            <form method="POST" action="" class="flex flex-col text-base gap-5">
                <input name='declinePending' value='<?= $userID ?>' hidden>
                <input name='desc' value='<?= $tempDescription ?>' hidden>
                <input name='category' value='<?= $tempCategory ?>' hidden>
                <input name='type' value='<?= $tempExpenseType ?>' hidden>
                <input name='amount' value='<?= $tempAmount ?>' hidden>
                <input name='expenseID' value='<?= $tempExpenseID ?>' hidden>
                <button type="submit" class="py-1 mt-4 text-lg sm:text-xl font-semibold btRed rounded-3xl">Decline $<?= $tempAmount ?> </button>
            </form>
        </div>
    </div>
</div>

<script>
    function <?= 'showAcceptPanel' . $index . '()' ?> {
        document.getElementById('<?= 'acceptPanel' . $index ?>').classList.toggle('hidden');
    }
    document.getElementById('<?= 'acceptOverlay' . $index ?>').addEventListener('click', (event) => {
        if (event.target === document.getElementById('<?= 'acceptOverlay' . $index ?>')) {
            document.getElementById('<?= 'acceptPanel' . $index ?>').classList.add('hidden');
        }
    });

    function <?= 'showDeclinePanel' . $index . '()' ?> {
        document.getElementById('<?= 'declinePanel' . $index ?>').classList.toggle('hidden');
    }
    document.getElementById('<?= 'declineOverlay' . $index ?>').addEventListener('click', (event) => {
        if (event.target === document.getElementById('<?= 'declineOverlay' . $index ?>')) {
            document.getElementById('<?= 'declinePanel' . $index ?>').classList.add('hidden');
        }
    });
</script>