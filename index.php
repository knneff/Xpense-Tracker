<?php

// ITO YUNG MAIN FILE NA MAGRURUN THROUGHOUT SA SERVER, KUMBAGA ANYWHERE YOU ARE FROM THE WEBSITE DITO LAGI UNA DAAN.
// meaning itong mga required na file sa baba is GLOBAL, lahat ng required na 'to naka-require din sa buong website
// meaning usable sila lahat throughout the whole website
// I hihgly suggest reading each of these files para mas maintindihan

require('Database.php'); //dito naka-setup yung PHP PDO Connection natin
require('functions.php'); //dito naka-lagay yung mga useful functions sa website natin
require('subscription.php');
require('router.php'); //ito yung nag-ro-route sa iba-ibang page kaya important na last line ito kasi ma-reredirect na sa ibang page after this line
