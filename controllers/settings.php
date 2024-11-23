<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
//Use $_SESSION['userid']; to get logged in user's userid

$title = 'Settings';
require('views/settings.view.php');

?>