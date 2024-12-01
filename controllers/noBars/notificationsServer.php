<?php

require __DIR__ . "/../../Database.php";

if (isset($_POST['count']) && is_array($_POST['count']) && !empty($_POST['count'])) {
    $notifIDs = $_POST['count'];

    $notifIDsString = implode(',', array_map('intval', $notifIDs));

    $sql = "UPDATE notification SET isViewed = 1 WHERE notifID IN ($notifIDsString)";

    $db->query($sql);
}

