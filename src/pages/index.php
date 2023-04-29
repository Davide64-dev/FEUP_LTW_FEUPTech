<?php
    include '../templates/common.tpl.php';
    include '../templates/main_page.tpl.php';
    include '../database/user.class.php';
    include '../utils/session.php';
    $user = new Agent("1", "cs", "Alan Turing");
    $session = new Session();

    drawMainHeader($session, $user);
    drawFooter();
?>