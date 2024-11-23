<?php require('partials/headNoSide.php') ?>

<!-- Sidebar -->
<div class="bg-gray-900 w-16 h-screen fixed shadow-lg z-10">
      <!-- Sidebar Content -->
      <!-- Icon 1 -->
      <div class="group relative">
        <img
          src="https://files.cults3d.com/uploaders/14013694/illustration-file/50f1a3a2-4979-4030-89fe-c7dfbaaa97ba/2023-05-25_22-38-38.png"
          alt="Icon 1"
          class="h-12 w-12 rounded-3xl mt-2 mb-2 mx-auto hover:rounded-xl transition-all ease-linear cursor-pointer shadow-lg"
        />
        <!-- Icon 1's Tooltip-->
        <div
          class="bg-gray-900 text-white absolute left-20 rounded-md top-2 shadow-md p-2 text-xs font-bold min-w-max group-hover:scale-100 transition-all duration-100 scale-0 origin-left"
        >
          Anthony's Group
        </div>
      </div>

      <!-- Divider -->
      <hr class="mx-2 rounded-full border-gray-700 border" />

      <!-- Icon 2 -->
      <div class="group relative">
        <img
          src="https://randomuser.me/api/portraits/women/0.jpg"
          alt="Icon 2"
          class="h-12 w-12 rounded-3xl mt-2 mb-2 mx-auto hover:rounded-xl transition-all ease-linear cursor-pointer shadow-lg"
        />
        <!-- Icon 2's Tooltip-->
        <div
          class="bg-gray-900 text-white absolute left-20 rounded-md top-2 shadow-md p-2 text-xs font-bold min-w-max group-hover:scale-100 transition-all duration-100 scale-0 origin-left"
        >
          Group X
        </div>
      </div>

      <!-- Icon 3 -->
      <div class="group relative">
        <img
          src="https://randomuser.me/api/portraits/men/1.jpg"
          alt="Icon 3"
          class="h-12 w-12 rounded-3xl mt-2 mb-2 mx-auto hover:rounded-xl transition-all ease-linear cursor-pointer shadow-lg"
        />
        <!-- Icon 3's Tooltip-->
        <div
          class="bg-gray-900 text-white absolute left-20 rounded-md top-2 shadow-md p-2 text-xs font-bold min-w-max group-hover:scale-100 transition-all duration-100 scale-0 origin-left"
        >
          Group Y
        </div>
      </div>

      <!-- Icon 4 -->
      <div class="group relative">
        <img
          src="https://randomuser.me/api/portraits/women/1.jpg"
          alt="Icon 4"
          class="h-12 w-12 rounded-3xl mt-2 mb-2 mx-auto hover:rounded-xl transition-all ease-linear cursor-pointer shadow-lg"
        />
        <!-- Icon 4's Tooltip-->
        <div
          class="bg-gray-900 text-white absolute left-20 rounded-md top-2 shadow-md p-2 text-xs font-bold min-w-max group-hover:scale-100 transition-all duration-100 scale-0 origin-left"
        >
          Group Z
        </div>
      </div>

      <!-- Divider -->
      <hr class="mx-2 rounded-full border-gray-700 border" />

      <!-- Icon 5 -->
      <div id="addPanelOpen" onclick="showPanelAdd()" class="group relative">
        <svg class="text-gray-300 hover:text-white h-14 w-14 rounded-3xl mt-2 mb-2 mx-auto hover:rounded-xl transition-all ease-linear cursor-pointer shadow-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
          <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
      </svg>

      <?php require('controllers/create-or-join-group.php') ?>

        <!-- Icon 5's Tooltip-->
        <div
          class="bg-gray-900 text-white absolute left-20 rounded-md top-3 shadow-md p-2 text-xs font-bold min-w-max group-hover:scale-100 transition-all duration-100 scale-0 origin-left"
        >
          Add a Group
        </div>
      </div>
    </div>

    <!-- Main Content Container -->
    <div class="flex ml-16 h-screen absolute top-0 left-0 right-0 bottom-0">
      <!-- Group Bar -->
      <div class="bg-gray-800 w-80 p-4">
        <!-- Group Title -->
        <div class="flex items-center mb-4">
          <h5 class="text-gray-400 text-lg font-bold tracking-wider pt-0.5">
            Anthony's Group
          </h5>
        </div>

        <!-- Group Form Container -->
        <div class="bg-gray-700 p-4 rounded-lg">
          <form class="space-y-4">
            <!-- Amount Field -->
            <div>
              <label class="block text-gray-300 font-semibold">Amount</label>
              <input
                type="text"
                class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
                placeholder="Enter amount"
              />
            </div>

            <!-- Category Field -->
            <div>
              <label class="block text-gray-300 font-semibold">Category</label>
              <select
                class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
              >
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
              <label class="block text-gray-300 font-semibold"
                >Description</label
              >
              <input
                type="text"
                class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
                placeholder="Enter description"
              />
            </div>

            <!-- Date Field -->
            <div>
              <label class="block text-gray-300 font-semibold">Date</label>
              <input
                type="date"
                class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
              />
            </div>

            <!-- Time Field -->
            <div>
              <label class="block text-gray-300 font-semibold">Time</label>
              <input
                type="time"
                class="w-full mt-1 p-2 rounded-md bg-gray-600 text-white border-none"
              />
            </div>

            <!-- Add Button -->
            <button
              type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md"
            >
              Add
            </button>
          </form>
        </div>
      </div>

      <!-- Content and Member List Section -->
      <div class="flex-grow flex flex-col">
        <!-- Navigation Bar -->
        <div class="bg-gray-600 p-4 h-16 drop-shadow-lg">
          <h5 class="text-white text-lg font-semibold flex items-center">
            <span class="text-gray-400 mr-2 text-3xl tracking-wider">#</span>
            Group Expense Record
          </h5>
        </div>

        <!-- Main Content and Members List -->
        <div class="flex flex-grow">
          <!-- Content Area -->
          <div class="flex-grow bg-gray-600 p-4">
            <div class="container mx-auto p-4">
              <div>
                <div
                  id="simplified"
                  class="max-w-7xl mx-auto text-white rounded-lg shadow-lg cursor-pointer"
                  onclick="toggleView()"
                >
                  <div
                    class="flex justify-between items-center bg-gray-700 rounded-t-lg px-4 py-2"
                  >
                    <h2 class="text-lg" id="description">Angel's Pizza</h2>
                    <p class="text-sm" id="expense_time">November 22, 2024</p>
                  </div>
                  <div
                    class="flex justify-between items-start px-4 py-3 bg-gray-800"
                  >
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
                      class="text-gray-300 bg-gray-800"
                      id="amount"
                      value="$500"
                    />
                  </div>

                  <div class="flex justify-between border-b pb-3 pt-3">
                    <span class="font-semibold text-gray-300">Category:</span>
                    <input
                      type="text"
                      class="text-gray-300 bg-gray-800"
                      id="category"
                      value="Food"
                    />
                  </div>

                  <div class="flex justify-between border-b pb-3 pt-3">
                    <span class="font-semibold text-gray-300"
                      >Description:</span
                    >
                    <input
                      type="text"
                      class="text-gray-300 bg-gray-800"
                      id="description"
                      value="Angel's Pizza"
                    />
                  </div>

                  <div class="flex justify-between border-b pb-3 pt-3">
                    <span class="font-semibold text-gray-300"
                      >Expense Date:</span
                    >
                    <input
                      type="text"
                      class="text-gray-300 bg-gray-800"
                      id="expense_date"
                      value="November 22, 2024"
                    />
                  </div>

                  <div class="flex justify-between border-b pb-3 pt-3">
                    <span class="font-semibold text-gray-300"
                      >Expense Time:</span
                    >
                    <input
                      type="text"
                      class="text-gray-300 bg-gray-800"
                      id="expense_time"
                      value="03:46 PM"
                    />
                  </div>

                  <div class="flex justify-start space-x-4 mt-4">
                    <button
                      onclick="saveChanges()"
                      class="bg-blue-500 text-gray-300 px-4 py-1 rounded-lg hover:bg-blue-600"
                    >
                      Save Changes
                    </button>
                    <button
                      onclick="deleteExpense()"
                      class="bg-red-500 text-gray-300 px-4 py-1 rounded-lg hover:bg-red-600"
                    >
                      Delete
                    </button>
                  </div>
                </form>

                <script>
                  const simplifiedView = document.getElementById("simplified");
                  let fullView = document.getElementById("fullView");

                  fullview_classname =
                    "m:max-w-md   sm:p-5 sm:mt-2     md:block lg:block  max-w-7xl    mx-auto     bg-gray-800    shadow-lg rounded-lg  p-5 mt-5     cursor-pointer";

                  function toggleView() {
                    if (fullView.classList.contains("hidden")) {
                      fullView.className = fullview_classname;
                    } else {
                      fullView.className = "hidden";
                      simplifiedView.className =
                        "max-w-7xl mx-auto bg-green-900 text-white rounded-lg shadow-lg cursor-pointer";
                    }
                  }

                  function saveChanges() {
                    fullView.className = "hidden";
                  }

                  function deleteExpense() {
                    fullView.className = "hidden";
                  }
                </script>
              </div>
            </div>
          </div>

          <!-- Members List -->
          <div class="bg-gray-800 w-60 p-4">
            <h5 class="text-gray-400 text-lg font-bold tracking-wider">
              Members - 5
            </h5>
            <ul class="mt-4">
              <li
                class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2"
              >
                <img
                  src="https://randomuser.me/api/portraits/men/0.jpg"
                  alt="icon"
                  class="w-6 h-6 mr-2 rounded-3xl"
                />
                <span class="text-white">Anthony Dayrit</span>
              </li>
              <li
                class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2"
              >
                <img
                  src="https://randomuser.me/api/portraits/women/0.jpg"
                  alt="icon"
                  class="w-6 h-6 mr-2 rounded-3xl"
                />
                <span class="text-white">Brishia Beltran</span>
              </li>
              <li
                class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2"
              >
                <img
                  src="https://randomuser.me/api/portraits/men/1.jpg"
                  alt="icon"
                  class="w-6 h-6 mr-2 rounded-3xl"
                />
                <span class="text-white">Keith Yamzon</span>
              </li>
              <li
                class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2"
              >
                <img
                  src="https://randomuser.me/api/portraits/women/1.jpg"
                  alt="icon"
                  class="w-6 h-6 mr-2 rounded-3xl"
                />
                <span class="text-white">Aeingel Pecson</span>
              </li>
              <li
                class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2"
              >
                <img
                  src="https://randomuser.me/api/portraits/men/2.jpg"
                  alt="icon"
                  class="w-6 h-6 mr-2 rounded-3xl"
                />
                <span class="text-white">Matt Ricohermoso</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>