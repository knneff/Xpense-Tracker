<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid



//current user
$userID = $_SESSION['userid'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // when a user deletes an expense
    if (isset($_POST['toDel'])) {
        $toDel = $_POST['toDel'];
        $db->query("DELETE FROM expenses WHERE expenseID = ?;", [$toDel]);
        redirect($_SERVER['REQUEST_URI']);
    }
} else if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (!isset($_GET['type']) || !isset($_GET['category'])) {
        //ensure a type value
        if (!isset($_GET['type'])) {
            $type = 'All';
        } else {
            $type = $_GET['type'];
        }

        //ensure a category value
        if (!isset($_GET['category'])) {
            $categ = 'All';
        } else {
            $categ = $_GET['category'];
        }

        redirect('/expenselog?type=' . $type . '&category=' . $categ);
    } else {
        $categ = $_GET['category'];
        $type = $_GET['type'];

        $filterByCateg = false;
        $filterByType = false;
        if ($type != 'All') {
            $filterByType = true;
        }
        if ($categ != 'All') {
            $filterByCateg = true;
        }

        if ($filterByCateg && $filterByType) {
            // filter on both category and type
            $expenses = $db->query('select * from expenses where userid=? AND expenseType=? AND category=? ORDER BY expenseTime DESC;', [$userID, $type, $categ])->fetchAll(PDO::FETCH_ASSOC);
        } else if ($filterByCateg && !$filterByType) {
            // filter by category
            $expenses = $db->query('select * from expenses where userid=? AND category=? ORDER BY expenseTime DESC;', [$userID, $categ])->fetchAll(PDO::FETCH_ASSOC);
        } else if (!$filterByCateg && $filterByType) {
            // filter by type
            $expenses = $db->query('select * from expenses where userid=? AND expenseType=? ORDER BY expenseTime DESC;', [$userID, $type])->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // shows all category and type of expenses
            $expenses = $db->query('select * from expenses where userid=? ORDER BY expenseTime DESC;', [$userID])->fetchAll(PDO::FETCH_ASSOC);
        }

        // $expenses = $db->query('select * from expenses where userid=? ORDER BY expenseTime DESC;', [$userID])->fetchAll(PDO::FETCH_ASSOC);
    }
}



$title = 'Expenses Log';
require('controllers/noBars/categories.php');

require('views/expenselog.view.php');
