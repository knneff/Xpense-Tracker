<!-- Group Members List -->
<div id='memberMenu' class="z-50 flex-col justify-between tlGreen gap-2 h-full px-4 pb-4 top-0 right-0 
  hidden w-0 fixed pt-20
  md:w-60 md:flex md:static md:pt-4
  ">

  <!-- Owner and Member (TOP)-->
  <div>

    <!-- Owner-->
    <div class=>
      <div class='flex flex-row justify-between'>
        <h3 class="text-gray-400 text-lg font-bold tracking-wider">Owner</h3>
        <button onclick="toggleMemberMenu()" title="Menu" class="">
          <svg class="size-6 textGray hover:text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
          </svg>
        </button>
      </div>

      <?php
      $userInfoTemp = $groupOwnerInfo;
      require('userPanel.view.php');
      ?>
    </div>

    <!--Members-->
    <div>
      <h3 class="text-gray-400 text-lg font-bold tracking-wider">
        Members - <?= sizeof($groupMembersInfo) ?>
      </h3>
      <ul class='flex flex-col'>
        <?php
        foreach ($groupMembersInfo as $memberInfo) {
          $userInfoTemp = $memberInfo;
          echo "<li>";
          require('userPanel.view.php');
          echo "</li>";
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

<script>
  function toggleMemberMenu() {
    document.getElementById('memberMenu').classList.toggle('w-0');
    document.getElementById('memberMenu').classList.toggle('w-60');
    document.getElementById('memberMenu').classList.toggle('md:w-0');
    document.getElementById('memberMenu').classList.toggle('md:w-60');

    document.getElementById('memberMenu').classList.toggle('hidden');
    document.getElementById('memberMenu').classList.toggle('flex');
    document.getElementById('memberMenu').classList.toggle('md:flex');
    document.getElementById('memberMenu').classList.toggle('md:hidden');
  }
</script>