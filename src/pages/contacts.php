<?php
    include '../templates/common.tpl.php';
    include '../templates/contacts.tpl.php';
    include '../utils/session.php';
    $session = new Session();
    drawHeader($session);
    drawContacts();
?>