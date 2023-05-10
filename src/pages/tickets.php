<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    include '../database/ticket.class.php';
    include '../database/user.class.php';
    include '../utils/session.php';
    include '../templates/tickets.tpl.php';
    $session = new Session();
    $db = getDatabaseConnection();
    $user = User::getUserWithId($db, $session->getID());

    $assigned = $user->getTickets($db, "Assigned");
    $closed = $user->getTickets($db, "Closed");
    $opened = $user->getTickets($db, "Opened");

    drawTicketsHeader($session);
    drawTickets($opened, $assigned, $closed);
?>