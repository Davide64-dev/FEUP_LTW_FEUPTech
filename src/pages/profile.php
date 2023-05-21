<?php
    require_once(__DIR__ . '/../templates/common.tpl.php');
    require_once(__DIR__ . '/../templates/profile.tpl.php');
    require_once(__DIR__ . '/../database/user.tpl.php');
    require_once(__DIR__ . '/../database/connection.tpl.php');
    require_once(__DIR__ . '/../utils/session.tpl.php');

    $session = new Session();
    $db = getDatabaseConnection();
    
    if (!$session->isLoggedIn()) die(header('Location: /'));
    $user = User::getUserWithId($db, $session->getID());

    $assigned = $user->getNumberTickets($db, "Assigned");
    $closed = $user->getNumberTickets($db, "Closed");
    $opened = $user->getNumberTickets($db, "Opened");
    $departments = $user->getAllDepartments($db);

    drawHeader($session);
    drawProfile($user, $session, $opened, $assigned, $closed, $departments);
?>