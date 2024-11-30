<?php require('partials/shared/bodySharing.php') ?>

<!-- Sidebar -->
<div class="bg-[#101b16db] w-16 h-screen fixed shadow-lg z-10">

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
        <a href='/shared?groupID={$group['groupID']}' class='group relative'>
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
  <?php require('partials/shared/createJoinGroup.view.php') ?>

</div>

<!-- Main Content Container -->
<div class="flex ml-16 h-screen top-0 left-0 right-0 bottom-0">
  <!-- Group Bar -->
  <div class="tlGreen w-80 p-4">

    <!-- Group Title -->
    <div class="flex items-center mb-4">
      <h2 class="text-gray-400 text-lg font-bold tracking-wider pt-0.5">
        <?= $groupName ?>
      </h2>
    </div>

    <!-- Divider-->
    <div class="h-1 bg-gradient-to-r from-green-800 via-gray-600 to-green-800 rounded-lg"></div>

    <!-- Group Form Container -->
    <div class="tlGreen p-4 rounded-lg">
      <form class="space-y-4">

        <!-- Amount Field -->
        <div>
          <label class="block text-gray-300 font-semibold">Amount</label>
          <input
            type="text"
            class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
            placeholder="Enter amount" />
        </div>

        <!-- Category Field -->
        <div>
          <label class="block text-gray-300 font-semibold">Category</label>
          <select
            class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none">
            <option value="food">Food</option>
            <option value="transportation">Transportation</option>
            <option value="entertainment">Entertainment</option>
            <option value="personal care">Personal Care</option>
            <option value="health & wellness">Health & Wellness</option>
            <option value="shopping">Shopping</option>
            <option value="utilities">Utilities</option>
            <option value="miscellaneous">Miscellaneous</option>
          </select>
        </div>

        <!-- Description Field -->
        <div>
          <label class="block text-gray-300 font-semibold">Description</label>
          <input
            type="text"
            class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
            placeholder="Enter description" />
        </div>

        <!-- Date Field -->
        <div>
          <label class="block text-gray-300 font-semibold">Date</label>
          <input
            type="date"
            class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none" />
        </div>

        <!-- Time Field -->
        <div>
          <label class="block text-gray-300 font-semibold">Time</label>
          <input
            type="time"
            class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none" />
        </div>

        <!-- Add Button -->
        <button
          type="submit"
          class="w-full bg-green-800 hover:bg-green-700 text-white font-semibold py-2 rounded-md">
          Add
        </button>
      </form>
    </div>
  </div>

  <!-- Content and Member List Section -->
  <div class="flex-grow flex flex-col">
    <!-- Navigation Bar -->
    <div class="bgGreen p-4 h-16 drop-shadow-lg">
      <h5 class="text-white text-lg font-semibold flex items-center">
        <span class="text-gray-400 mr-2 text-3xl tracking-wider">#</span>
        Group Expense Record
      </h5>
    </div>

    <!-- Main Content and Members List -->
    <div class="flex flex-grow">

      <!-- Content Area -->
      <div class="flex-grow bgGreen p-4">
        <div class="container mx-auto p-4">
          <div>
            <div
              id="simplified"
              class="max-w-7xl mx-auto text-white rounded-lg shadow-lg cursor-pointer drop-shadow-lg"
              onclick="toggleView()">
              <div
                class="flex justify-between items-center bg-green-800 rounded-t-2xl px-4 py-2">
                <h2 class="text-lg" id="description">Angel's Pizza</h2>
                <p class="text-sm" id="expense_time">November 22, 2024</p>
              </div>
              <div
                class="flex justify-between items-start px-4 py-3 bg-[#03352c] rounded-b-2xl">
                <div>
                  <p class="text-sm text-gray-300 pb-2" id="category">
                    Category: Food
                  </p>
                </div>
                <p class="text-lg font-bold" id="amount">₱500</p>
              </div>
            </div>

            <!-- Full View -->
            <form id="fullView" method="POST" action="" class="hidden">
              <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Amount:</span>
                <input
                  type="text"
                  class="text-gray-300 bg-[#03352c]"
                  id="amount"
                  value="$500" />
              </div>

              <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Category:</span>
                <input
                  type="text"
                  class="text-gray-300 bg-[#03352c]"
                  id="category"
                  value="Food" />
              </div>

              <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Description:</span>
                <input
                  type="text"
                  class="text-gray-300 bg-[#03352c]"
                  id="description"
                  value="Angel's Pizza" />
              </div>

              <div class="flex justify-between border-b pb-3 pt-3">
                <span class="font-semibold text-gray-300">Expense Date:</span>
                <input
                  type="text"
                  class="text-gray-300 bg-[#03352c]"
                  id="expense_date"
                  value="November 22, 2024" />
              </div>

              <div class="flex justify-between pb-3 pt-3">
                <span class="font-semibold text-gray-300">Expense Time:</span>
                <input
                  type="text"
                  class="text-gray-300 bg-[#03352c]"
                  id="expense_time"
                  value="01:47 PM" />
              </div>
            </form>

            <script>
              const simplifiedView = document.getElementById("simplified");
              let fullView = document.getElementById("fullView");

              fullview_classname =
                "m:max-w-md   sm:p-5 sm:mt-2     md:block lg:block  max-w-7xl    mx-auto     bg-[#03352c]    shadow-lg rounded-lg  p-5 mt-5  drop-shadow-lg   cursor-pointer";

              function toggleView() {
                if (fullView.classList.contains("hidden")) {
                  fullView.className = fullview_classname;
                } else {
                  fullView.className = "hidden";
                  simplifiedView.className =
                    "max-w-7xl mx-auto text-white rounded-lg shadow-lg cursor-pointer drop-shadow-lg";
                }
              }
            </script>
          </div>
        </div>
      </div>

      <!-- Members List -->
      <div class="tlGreen flex flex-col gap-2 w-60 pt-4 px-4">

        <!-- Show Either "Generate Invite Link" or "Show Invite Link" Button -->
        <?php
        if (isset($groupTokenHash)) { //if there's an ongoing invite link
          $tokenExpiry = new DateTime($groupTokenExpiry);
          $currentDateTime = new DateTime();
          // if invite link is expired (30 mins has passed since last generation)
          if ($tokenExpiry < $currentDateTime) {
            //deletes groupTokenHash and tokenExpiry
            $db->query("UPDATE clan SET groupTokenHash = NULL, groupTokenExpiry = NULL WHERE groupID = ?;", [$groupID]);
            echo "<form method='POST' action='/gen_invite'>
                <input name='groupID' value='$groupID' hidden>
                <button type='submit' class='flex flex-row justify-center w-full py-2 px-2 items-center gap-1 btGreen rounded-lg'>
                  <svg class='size-5' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
                  </svg>
                  <p class='pb-1'>Generate Invite Link</p>
                </button>
              </form>
            ";
          } else { //there's an ongoing invite link and not expired
            $interval = $currentDateTime->diff($tokenExpiry);
            $minutes = $interval->i;
            echo "<div class='flex flex-col justify-center items-center'>
                <button onclick='showInvite()' class='flex flex-row justify-center w-full py-2 px-2 items-center gap-1 btGreen rounded-lg'>
                  <svg class='size-5' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244' />
                  </svg>
                  <p class='pb-1'>Show Invite Link</p>
                </button>
                <p class='text-sm textRed'>Expires in $minutes minutes</p>
              </div>
            ";
            require('views/partials/shared/invite.view.php');
          }
        } else { // when there's no onoing invite link
          echo "<form method='POST' action='/gen_invite'>
              <input name='groupID' value='$groupID' hidden>
                <button type='submit' class='flex flex-row justify-center w-full py-2 px-2 items-center gap-1 btGreen rounded-lg'>
                  <svg class='size-5' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
                  </svg>
                  <p class='pb-1'>Generate Invite Link</p>
                </button>
            </form>
          ";
        }
        ?>

        <!--Members Count-->
        <h5 class="text-gray-400 text-lg font-bold tracking-wider">
          Members - 5
        </h5>

        <!--Members-->
        <ul class="mt-4">
          <li
            class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2">
            <img
              src="https://randomuser.me/api/portraits/men/0.jpg"
              alt="icon"
              class="w-6 h-6 mr-2 rounded-3xl" />
            <span class="text-white">Anthony Dayrit</span>
          </li>

          <li
            class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2">
            <img
              src="https://randomuser.me/api/portraits/women/0.jpg"
              alt="icon"
              class="w-6 h-6 mr-2 rounded-3xl" />
            <span class="text-white">Brishia Beltran</span>
          </li>

          <li
            class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2">
            <img
              src="https://randomuser.me/api/portraits/men/1.jpg"
              alt="icon"
              class="w-6 h-6 mr-2 rounded-3xl" />
            <span class="text-white">Keith Yamzon</span>
          </li>

          <li
            class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2">
            <img
              src="https://randomuser.me/api/portraits/women/1.jpg"
              alt="icon"
              class="w-6 h-6 mr-2 rounded-3xl" />
            <span class="text-white">Aeingel Pecson</span>
          </li>

          <li
            class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2">
            <img
              src="https://randomuser.me/api/portraits/men/2.jpg"
              alt="icon"
              class="w-6 h-6 mr-2 rounded-3xl" />
            <span class="text-white">Matt Ricohermoso</span>
          </li>

        </ul>

      </div>

    </div>
  </div>

</div>