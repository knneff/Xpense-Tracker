<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

$title = 'Audit Log';
//create database instance
$db = new Database();
//current user
$auditLog = $db->query('select * from audit_log ORDER BY logID DESC LIMIT 100;', [])->fetchAll(PDO::FETCH_ASSOC);

require('views/audit.view.php');
