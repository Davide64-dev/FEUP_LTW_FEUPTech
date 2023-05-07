<?php
    include '../templates/common.tpl.php';
    include '../templates/profile.tpl.php';
    include '../database/user.class.php';
    include '../database/connection.db.php';
    include '../utils/session.php';
    require_once(__DIR__ . '/../database/connection.db.php');

    $session = new Session();
    $db = getDatabaseConnection();
    
    if (!$session->isLoggedIn()) die(header('Location: /'));
    $user = User::getUserWithEmail($db, $session->getEmail());

    $assigned = $user->getNumberTickets($db, "Assigned");
    $closed = $user->getNumberTickets($db, "Closed");
    $opened = $user->getNumberTickets($db, "Opened");

    drawHeader($session);
    drawProfile($user, $session, $opened, $assigned, $closed);
?>