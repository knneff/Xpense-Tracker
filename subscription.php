<?php
date_default_timezone_set("Asia/Manila");
$currentDateTime = date("Y-m-d H:i:s");
$sql = "SELECT * FROM subscriptions WHERE paymentDateTime <= :currentDateTime";
$params = [':currentDateTime' => $currentDateTime];
$subscriptions = $db->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);

if ($subscriptions !== null && count($subscriptions) !== 0) {
    foreach ($subscriptions as $subscription) {
        $userID = $subscription['userID'];
        $amount = $subscription['amount'];
        $category = $subscription['category'];
        $description = $subscription['description'];
        $expenseType = 'subscription';
        $expenseTime = $currentDateTime;
        $subscriptionID = $subscription['subscriptionID'];

        $sql = "INSERT INTO expenses (userID, amount, category, description, expenseType, expenseTime, subscriptionID)
            VALUES (:userID, :amount, :category, :description, :expenseType, :expenseTime, :subscriptionID)";

        $params = [
            ':userID' => $userID,
            ':amount' => $amount,
            ':category' => $category,
            ':description' => $description,
            ':expenseType' => $expenseType,
            ':expenseTime' => $expenseTime,
            ':subscriptionID' => $subscriptionID
        ];

        $db->query($sql, $params);

        $period = $subscription['period'];
        $paymentDateTime = $subscription['paymentDateTime'];
        $nextPaymentDate = date("Y-m-d H:i:s", strtotime("+$period days", strtotime($paymentDateTime)));

        // Update the paymentDateTime for the next period
        $sql = "UPDATE subscriptions SET paymentDateTime = :nextPaymentDate WHERE subscriptionID = :subscriptionID";
        $params = [
            ':nextPaymentDate' => $nextPaymentDate,
            ':subscriptionID' => $subscription['subscriptionID'],
        ];

        $db->query($sql, $params);
    }
}
