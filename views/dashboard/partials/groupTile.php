<!-- GROUPS -->
<div class='shadow-lg tlGreen rounded-3xl w-full sm:w-56 px-4 h-48 mx-2 my-2 textGray'>
    <!-- Title and Link to Full List -->
    <div class='flex flex-row justify-between items-baseline py-1'>
        <p class="textGray text-xl font-semibold">My Groups</p>
        <a href='/group' class='textTeal hover:underline'>See All</a>
    </div>

    <!-- divider -->
    <hr class='border border-1 border-gray-400'>

    <!-- List -->
    <?php
    if (empty($groups)) {
        echo "<p class='text-center py-12 font-semibold textGray'>No Groups Yet :/</p>";
    } else {
        echo "<ul>";
        foreach ($groups as $index => $group) {
            $groupName = stringShortener($group['groupName'], 18);
            $groupIcon = $group['groupIcon'];
            $groupID = $group['groupID'];
            echo "
                <li>
                    <a href='group?id=$groupID' class='textGray flex gap-2 py-2 px-1 items-center border-t border-gray-600 hover:bg-emerald-900'>
                        <img class = 'size-8 rounded-3xl' src = '$groupIcon'>
                        <span>$groupName</span>
                    </a>
                </li>
            ";
        }
        echo "</ul>";
    }

    ?>
</div>