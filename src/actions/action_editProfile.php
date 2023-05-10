<?php
    declare(strict_types = 1);
    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/user.class.php');
    $db = getDatabaseConnection();
    $user = User::getUserWithID($db, $session->getID());
    $password = sha1($_POST['password']);

    $user->updateUser($db, $_POST['username'], $_POST['name'], $password, $_POST['email']);

    header('Location: ../pages/profile.php');

?>