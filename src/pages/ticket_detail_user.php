<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    include '../database/ticket.class.php';
    include '../database/user.class.php';
    include '../utils/session.php';
    include '../templates/tickets.tpl.php';
    include '../templates/ticket_detail.tpl.php';
    $session = new Session();
    $db = getDatabaseConnection();
    $user = User::getUserWithId($db, $session->getID());

    $ticket = $user->getTicketWithID($db, $_GET['ticket']);

    drawTicketsHeader($session, "<link href=\"../css/ticketsDetail_style.css\" rel=\"stylesheet\">");
    drawTicketDetail($ticket, $user, false);
?>