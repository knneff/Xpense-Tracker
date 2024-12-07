<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid
$userID = $_SESSION['userid'];

//EVERYTHING POST RELATED
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //WHEN SUBSCRIPTION IS DELETED
    if (isset($_POST['toDel'])) {
        $toDel = $_POST['toDel'];
        $db->query("DELETE FROM subscriptions WHERE subscriptionID = ?;", [$toDel]);
        redirect($_SERVER['REQUEST_URI']);
    }
    //when a user accepts a pending SUBSCRIPTION
    else if (isset($_POST['acceptPending'])) {
        $amount = $_POST['amount'];
        $subscriptionID = $_POST['subscriptionID'];

        //WHEN USER HAS INSUFFICIENT BALANCE?
        if ($amount > $_SESSION['balance']) {
            alertRedirect("Insufficient Balance!", '/subscriptions');
        }

        $category = $_POST['category'];
        $description = $_POST['desc'];
        $expenseType = $_POST['type'];
        $expenseID = $_POST['expenseID'];
        date_default_timezone_set('Asia/Manila');
        $currentDateTime = new DateTime();
        $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');

        //update expenseshistory expenseState to 'paid' and expenseTime to Now()
        $db->query("UPDATE expensesHistory SET expenseTime = ?, expenseState = 'paid' WHERE expenseID = ?;", [$currentDateTimeString, $expenseID]);

        //insert into expenses table
        $sql = "INSERT INTO expenses(userID, amount, category, description, expenseType, expenseTime, subscriptionID) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = [$userID, $amount, $category, $description, $expenseType, $currentDateTimeString, $subscriptionID];
        $db->query($sql, $params);

        redirect('/subscriptions');
    }
    //when a user declines a pending SUBSCRIPTION
    else if (isset($_POST['declinePending'])) {
        $expenseID = $_POST['expenseID'];
        date_default_timezone_set('Asia/Manila');
        $currentDateTime = new DateTime();
        $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');
        //update expenseshistory expenseState to 'paid' and expenseTime to Now()
        $db->query("UPDATE expensesHistory SET expenseTime = ?, expenseState = 'declined' WHERE expenseID = ?;", [$currentDateTimeString, $expenseID]);
        redirect('/subscriptions');
    }
}

$title = 'Subscription List';

//subscriptions
$subscriptions = $db->query('select * from subscriptions WHERE userid=? ORDER BY paymentDateTime ASC;', [$userID])->fetchAll(PDO::FETCH_ASSOC);
//pending subscriptions of curr user
$currUserPendings = $db->query("SELECT expensesHistory.* , users.username, users.userIcon from expensesHistory JOIN users ON expensesHistory.userID = users.userid WHERE expensesHistory.expenseType=? AND users.userid=? AND expensesHistory.expenseState=? ORDER BY expenseTime ASC;", ['subscription', $userID, 'pending'])->fetchAll(PDO::FETCH_ASSOC);

require('controllers/noBars/categories.php');
require('views/subscriptions.view.php');
