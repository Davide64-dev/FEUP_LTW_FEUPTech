<?php
    include '../templates/common.tpl.php';
    include '../templates/profile.tpl.php';
    include '../database/agent.class.php';
    $user = new Client("1", "cs", "Alan", "Turing");
    drawHeader();
    drawProfile($user);
?>