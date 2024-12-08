<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['support'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];

    $sql = "INSERT INTO supportMessage (name, email, message) 
        VALUES (:name, :email, :message)";

    $params = [
        ':name' => $name,
        ':email' => $email,
        ':message' => $message,
    ];

    $db->query($sql, $params);

    $supportMessage = "Your message has been sent successfully. We will contact you via the provided email shortly.";
}
require('views/noBarsPages/support.view.php');