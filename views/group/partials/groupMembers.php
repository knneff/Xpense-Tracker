<!-- Group Members List -->
<div class="flex flex-col justify-between tlGreen gap-2 h-full w-60 px-4 pt-2 pb-4">

  <!-- Owner and Member (TOP)-->
  <div>
    <!-- Owner -->
    <div>
      <h3 class="text-gray-400 text-lg font-bold tracking-wider">Owner</h3>
      <?php
      $userInfoTemp = $groupOwnerInfo;
      require('userPanel.view.php');
      ?>
    </div>

    <!--Members-->
    <div>
      <h3 class="text-gray-400 text-lg font-bold tracking-wider">
        Members - <?= $groupMembersCount ?>
      </h3>
      <ul>
        <?php
        foreach ($groupMembersInfo as $memberInfo) {
          $userInfoTemp = $memberInfo;
          require('userPanel.view.php');
        }
        ?>
      </ul>
    </div>

  </div>

  <!-- Show Either "Generate Invite Link" or "Show Invite Link" Button (BOTTOM-->
  <?php
  if (isset($groupTokenHash)) { //if there's an ongoing invite link
    $tokenExpiry = new DateTime($groupTokenExpiry);
    $currentDateTime = new DateTime();
    // if invite link is expired (30 mins has passed since last generation)
    if ($tokenExpiry < $currentDateTime) {
      //deletes groupTokenHash and tokenExpiry
      $db->query("UPDATE clan SET groupTokenHash = NULL, groupTokenExpiry = NULL WHERE groupID = ?;", [$groupID]);
      require('btnGenInvite.php');
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