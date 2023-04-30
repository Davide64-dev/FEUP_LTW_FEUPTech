<?php
    include '../templates/common.tpl.php';
    include '../templates/faq.tpl.php';
    include '../utils/session.php';
    $session = new Session();
    drawFAQ($session);
?>