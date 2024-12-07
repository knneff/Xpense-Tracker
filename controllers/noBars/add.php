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
    } else if ($_POST['type'] === 'sub') {
        $datetime = $_POST['datetime'];
        $datetimeObject = new DateTime($datetime);
        $paymentDateToday = $datetimeObject->format('Y-m-d 00:00:00');
        $datetimeObject->modify("+{$_POST['period']} days");

        $userID = $_SESSION['userid'];
        $paymentDateTime = $datetimeObject->format('Y-m-d 00:00:00');
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

        if ($_POST['payToday'] === 'on') {
            $sql = "INSERT INTO expensesHistory (userID, amount, category, description, expenseType, expenseTime, subscriptionID, expenseState)
                    VALUES (:userID, :amount, :category, :description, :expenseType, :expenseTime, :subscriptionID, :expenseState)";

            $params = [
                ':userID' => $userID,
                ':amount' => $amount,
                ':category' => $category,
                ':description' => $description,
                ':expenseType' => 'subscription',
                ':expenseTime' => $paymentDateToday,
                ':subscriptionID' => $db->connection->lastInsertId(),
                ':expenseState' => 'pending'
            ];

            $db->query($sql, $params);

            $sql = "INSERT INTO notification (userID, title, body) VALUES (:userID, :title, :body)";

            $params = [
                ':userID' => $userID,
                ':title' => 'Subscription Pending Expense! <hr class="text-gray-600">',
                ':body' => 'An amount of <b>$' . $amount . '</b> has been added to your pending expense from <u>' . $description . '</u> subscription. Click <a class="textTeal hover:underline" href="/subscriptions">here</a> to see.'
            ];

            $db->query($sql, $params);
        }

        header("Location: {$_SERVER['REQUEST_URI']}");
        exit;
    }
}
