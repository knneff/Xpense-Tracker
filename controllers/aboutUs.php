<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

$title = 'About Us';
//create database instance


require('views/aboutUs.view.php');
