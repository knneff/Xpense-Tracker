<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addExpense'])) {
   if ($_POST['type'] === 'basic') {
        $userID = $_SESSION['userid'];
        $amount = $_POST['amount']; 
        $category = $_POST['category']; 
        $description = $_POST['desc']; 
        $expenseType = 'basic'; 
        $dateTime = $_POST['datetime']; 
        
        $sql = "INSERT INTO expenses (userID, amount, category, description, expenseType, expenseTime)
        VALUES (:userID, :amount, :category, :description, :expenseType, :expenseTime)";

        $params = [
            ':userID' => $userID,
            ':amount' => $amount,
            ':category' => $category,
            ':description' => $description,
            ':expenseType' => $expenseType,
            ':expenseTime' => $dateTime,
        ];

        $db->query($sql, $params);

        header("Location: {$_SERVER['REQUEST_URI']}");
        exit;
    }
    
    else if ($_POST['type'] === 'sub') {
        $datetime = $_POST['datetime']; 
        $datetimeObject = new DateTime($datetime);
        $formattedDate = $datetimeObject->format('Y-m-d 00:00:00'); 

        if ($_POST['payToday'] !== 'on') {
            $datetimeObject->modify("+{$_POST['period']} days");
            $formattedDate = $datetimeObject->format('Y-m-d 00:00:00');
        }
        
        $userID = $_SESSION['userid'];
        $paymentDateTime = $formattedDate;
        $period = $_POST['period'];
        $amount = $_POST['amount'];
        $category = $_POST['category'];
        $description = $_POST['desc'];

        $sql = "INSERT INTO subscriptions (userID, paymentDateTime, period, amount, category, description)
        VALUES (:userID, :paymentDateTime, :period, :amount, :category, :description)";

        $params = [
            ':userID' => $userID,
            ':paymentDateTime' => $paymentDateTime,
            ':period' => $period,
            ':amount' => $amount,
            ':category' => $category,
            ':description' => $description,
        ];

        $db->query($sql, $params);

        header("Location: {$_SERVER['REQUEST_URI']}");
        exit;
    }

}

require('views/add.view.php');

?>
