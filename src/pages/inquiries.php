<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    include '../database/ticket.class.php';
    include '../database/user.class.php';
    include '../utils/session.php';
    include '../database/inquirie.class.php';
    include '../templates/tickets.tpl.php';
    include '../templates/inquiries.tpl.php';

    $session = new Session();
    $db = getDatabaseConnection();
    $user = User::getUserWithId($db, $session->getID());

    $ticket = $user->getTicketWithID($db, intval($_GET['ticket']));
    
    $inquiries = $ticket->getInquiries($db);


    drawTicketsHeader($session, "<link href=\"../css/inquires_style.css\" rel=\"stylesheet\">");
    drawInquiries($inquiries, $ticket, $user);
?>