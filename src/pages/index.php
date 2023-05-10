<?php
    include '../templates/common.tpl.php';
    include '../templates/main_page.tpl.php';
    include '../database/user.class.php';
    include '../utils/session.php';
    $session = new Session();

    drawMainHeader($session);
    drawFooter();
?>