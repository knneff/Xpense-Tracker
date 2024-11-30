<!-- Group Members List -->
<div class="flex flex-col justify-between tlGreen gap-2 w-60 px-4 pt-2 pb-20">

  <!-- Owner and Member -->
  <div>
    <!-- Owner -->
    <h3 class="text-gray-400 text-lg font-bold tracking-wider">
      Owner
    </h3>
    <div class="flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2">
      <img
        src="<?= $groupOwnerInfo['userIcon'] ?>"
        alt="icon"
        class="w-6 h-6 mr-2 rounded-3xl" />
      <span class="text-white"><?= $groupOwnerInfo['username'] ?></span>
    </div>

    <!--Members-->
    <h3 class="text-gray-400 text-lg font-bold tracking-wider">
      Members - <?= $groupMembersCount ?>
    </h3>
    <ul>
      <?php
      foreach ($groupMembersInfo as $index => $memberInfo) {
        $memberUsername = $memberInfo['username'];
        $memberIcon = $memberInfo['userIcon'];
        echo "<li
          class='flex items-center p-2 hover:bg-gray-700 cursor-pointer rounded mb-2'>
          <img
            src='$memberIcon'
            alt='icon'
            class='w-6 h-6 mr-2 rounded-3xl' />
          <span class='text-white'>$memberUsername</span>
        </li>
      ";
      }
      ?>
    </ul>
  </div>

  <!-- Show Either "Generate Invite Link" or "Show Invite Link" Button -->
  <?php
  if (isset($groupTokenHash)) { //if there's an ongoing invite link
    $tokenExpiry = new DateTime($groupTokenExpiry);
    $currentDateTime = new DateTime();
    // if invite link is expired (30 mins has passed since last generation)
    if ($tokenExpiry < $currentDateTime) {
      //deletes groupTokenHash and tokenExpiry
      $db->query("UPDATE clan SET groupTokenHash = NULL, groupTokenExpiry = NULL WHERE groupID = ?;", [$groupID]);
      require('btnGenInvite.view.php');
    } else { //there's an ongoing invite link and not expired
      $expiryToNowInterval = $currentDateTime->diff($tokenExpiry);
      $expiryInMinutes = $expiryToNowInterval->i;
      require('btnShowInvite.php');
    }
  } else { // when there's no onoing invite link
    require('btnGenInvite.php');
  }
  ?>

</div>