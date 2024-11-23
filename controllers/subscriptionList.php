<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

$title = 'Subscription List';

require('views/subscriptionlist.view.php');
