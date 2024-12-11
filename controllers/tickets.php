<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

$title = 'Tickets';

//current user
$tickets = $db->query('select * from supportMessage ORDER BY id DESC;', [])->fetchAll(PDO::FETCH_ASSOC);

require('views/tickets.view.php');
