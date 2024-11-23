<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

$userID = $_SESSION['userid'];

$userInfo = $db->query('select * from users where userid = ?;', [$userID])->fetch(PDO::FETCH_ASSOC);

$title = "{$userInfo['username']}'s Goals";

require('views/goal.view.php');

?>