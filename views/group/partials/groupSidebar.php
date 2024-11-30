<div class="bg-[#101b16db] w-16 h-screen shadow-lg z-10">

    <!-- Current Group -->
    <div id='currGroup' class="group relative">
        <img
            src="<?= $groupIcon ?>"
            alt="<?= $groupName . " Icon" ?>"
            class="h-12 w-12 rounded-3xl mt-2 mb-2 mx-auto hover:rounded-xl transition-all ease-linear cursor-pointer shadow-lg" />
        <!-- Icon 1's Tooltip-->
        <div
            class="bg-gray-900 text-white absolute left-20 rounded-md top-2 shadow-md p-2 text-xs font-bold min-w-max group-hover:scale-100 transition-all duration-100 scale-0 origin-left">
            <?= $groupName ?>
        </div>
    </div>
    <hr class="mx-2 rounded-full border-gray-700 border" />

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