<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/user.class.php');
    require_once(__DIR__ . '/../database/ticket.class.php');
    $db = getDatabaseConnection();

    $user = User::getUserWithID($db, $session->getID()); // Uncomment this line if needed

    $agentID = (int) $_GET['idAgent'];
    $agent = Agent::getUserWithID($db, $agentID); // Fetch the agent with the provided ID

    if ($agent) {
        Ticket::assignTicket($db, $agent); // Assign the ticket to the agent
    }

    header('Location: ../pages/tickets_all.php');
    exit;
?>
