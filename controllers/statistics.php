<?php
//protects the page from being accessed when no user is logged in. 
protectPage();

// Use $_SESSION['userid']; to get logged in user's userid
$userID = $_SESSION['userid'];

$title = "Statistics";

require('views/statistics.view.php');