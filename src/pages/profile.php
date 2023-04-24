<?php
    include '../templates/common.tpl.php';
    include '../templates/profile.tpl.php';
    include '../database/user.class.php';
    $user = new User("1", "cs", "Alan", "Turing");
    drawHeader();
    drawProfile($user);
?>