<?php
    include '../templates/common.tpl.php';
    include '../templates/about_us.tpl.php';
    include '../utils/session.php';
    $session = new Session();
    drawHeader($session);
    drawAboutUs();
?>