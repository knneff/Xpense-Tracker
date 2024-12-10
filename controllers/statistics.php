<?php
//protects the page from being accessed when no user is logged in. 
protectPage();

// Use $_SESSION['userid']; to get logged in user's userid
$userID = $_SESSION['userid'];

//title
$title = "Statistics";

//chart info

/*
SELECT *
FROM your_table
WHERE your_datetime_column >= DATE_SUB(NOW(), INTERVAL 7 DAY);

SELECT 
    CONVERT_TZ(your_datetime_column, '+00:00', 'Asia/Manila') AS converted_datetime
FROM your_table;

SELECT *
FROM your_table
WHERE CONVERT_TZ(your_datetime_column, '+00:00', 'Asia/Manila') >= DATE_SUB(CONVERT_TZ(NOW(), '+00:00', 'Asia/Manila'), INTERVAL 7 DAY);

*/


require('controllers/noBars/categories.php');


$expenses7 = $db->query("SELECT amount, description, category, expenseTime FROM expenses WHERE CONVERT_TZ(expenseTime, '+00:00', 'Asia/Manila') >= DATE_SUB(CONVERT_TZ(expenseTime, '+00:00', 'Asia/Manila'), INTERVAL 7 DAY) AND userID=? ORDER BY expenseTime DESC;", [$userID])->fetchAll(PDO::FETCH_ASSOC);
require('controllers/noBars/statsLine.php');

$expenses = $db->query('select amount, description, category from expenses where userID=? ORDER BY expenses.expenseTime DESC;', [$userID])->fetchAll(PDO::FETCH_ASSOC);
require('controllers/noBars/statsPieDonut.php');


require('views/statistics.view.php');
