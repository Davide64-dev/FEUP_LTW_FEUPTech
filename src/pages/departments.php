<?php
    include '../templates/common.tpl.php';
    include '../templates/faq.tpl.php';
    include '../templates/departments.tpl.php';
    include '../utils/session.php';
    include '../database/user.class.php';
    include '../database/ticket.class.php';
    require_once(__DIR__ . '/../database/connection.db.php');

    $session = new Session();
    $db = getDatabaseConnection();
    $user = Agent::getUserWithId($db, $session->getID());
    $departments = $user->getDepartments($db);

    drawHeader($session);
    drawBegin($session, $user);
    foreach($departments as $department){
        drawDepartment($department, $user, $db);
      }
    drawEnd($user);
?>