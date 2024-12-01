<div class="tlGreen w-16 h-screen shadow-lg z-10">

    <!-- Current Group -->
    <div id='currGroup' class="flex items-center bgGreen h-16 rounded-l-xl border-gray-600 border-l border-t border-b relative">
        <img
            src="<?= $groupIcon ?>"
            alt="<?= $groupName . " Icon" ?>"
            class="h-12 w-12 mx-auto rounded-xl cursor-pointer shadow-lg" />
        <button onclick="showEditGroup()" class="size-12 mx-2 rounded-xl cursor-pointer absolute opacity-0 hover:opacity-60 flex justify-center items-center bg-black">
            <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </button>
    </div>

    <!-- Divider -->
    <!-- <hr class="mx-2 rounded-full border-gray-700 border" /> -->

    <!-- Group List (w/o the selected group) -->
    <?php
    foreach ($groups as $index => $group) {
        if ($group['groupID'] != $groupID) {
            $tempGroupName = $group['groupName'];
            $tempGroupIcon = $group['groupIcon'];
            echo "
        <a href='/group?id={$group['groupID']}' class='group relative'>
          <img
            src='$tempGroupIcon'
            class='h-12 w-12 rounded-3xl mt-2 mb-2 mx-auto hover:rounded-xl transition-all ease-linear cursor-pointer shadow-lg' />
          <div class='bg-gray-900 text-white absolute left-20 rounded-md top-2 shadow-md p-2 text-xs font-bold min-w-max group-hover:scale-100 transition-all duration-100 scale-0 origin-left'>
            $tempGroupName
          </div>
        </a>
      ";
        }
    }
    ?>

    <!-- Divider -->
    <hr class="mx-2 rounded-full border-gray-700 border" />

    <!-- Add Group Button -->
    <div class="group relative" id="groupPanelBtn" onclick="showGroupPanel()">
        <svg
            class="text-gray-300 hover:text-white h-14 w-14 rounded-3xl mt-2 mb-2 mx-auto hover:rounded-xl transition-all ease-linear cursor-pointer shadow-lg"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
                fill-rule="evenodd"
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                clip-rule="evenodd" />
        </svg>
        <!-- Add Group Tooltip-->
        <div
            class="bg-gray-900 text-white absolute left-20 rounded-md top-3 shadow-md p-2 text-xs font-bold min-w-max group-hover:scale-100 transition-all duration-100 scale-0 origin-left">
            Add a Group
        </div>
    </div>

    <!-- Group Panel -->
    <?php require('createJoin.php') ?>

</div>