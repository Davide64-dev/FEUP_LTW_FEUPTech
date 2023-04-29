<?php
    include '../templates/common.tpl.php';
    include '../templates/profile.tpl.php';
    include '../database/user.class.php';
    include '../database/connection.db.php';
    include '../utils/session.php';
    require_once(__DIR__ . '/../database/connection.db.php');

    $session = new Session();
    $db = getDatabaseConnection();
    
    $user = User::getUserWithEmail($db, $_SESSION['email']);

    drawHeader($session);
    drawProfile($user, $session);
?>