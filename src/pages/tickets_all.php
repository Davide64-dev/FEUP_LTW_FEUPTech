<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    include '../database/ticket.class.php';
    include '../database/user.class.php';
    include '../utils/session.php';
    include '../templates/tickets.tpl.php';
    include '../templates/tickets_all.tpl.php';
    $session = new Session();
    $db = getDatabaseConnection();
    $user = User::getUserWithId($db, $session->getID());

    $tickets = "";

    drawTicketsHeader($session);
    drawTicketsAll($tickets);
?>