<?php

//protects the page from being accessed when no user is logged in. 
protectPage();
// Use $_SESSION['userid']; to get logged in user's userid

$title = 'Tickets';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['deleteTicket'])) {
    $ticketID = $_POST['deleteTicket'];

    $sql = "DELETE FROM supportMessage WHERE id = :ticketID";

    $params = [
        ':ticketID' => $ticketID,
    ];

    $db->query($sql, $params);
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit;
}

$tickets = $db->query('SELECT * FROM supportMessage ORDER BY id DESC;', [])->fetchAll(PDO::FETCH_ASSOC);

require('views/tickets.view.php');
