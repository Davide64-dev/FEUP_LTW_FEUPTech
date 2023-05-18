<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/user.class.php');
    require_once(__DIR__ . '/../database/ticket.class.php');
    $db = getDatabaseConnection();

    $user = User::getUserWithID($db, $session->getID()); 
    $idticket = $_GET["ticket"];
    $ticket = $user->getTicketWithID($db, $idticket);

    $ticket->updateStatus($db, "Closed");
    header("Location: ../pages/departments.php");
?>
