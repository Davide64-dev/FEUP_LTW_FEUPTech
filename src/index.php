<?php
    include 'database/user.class.php';
    include 'templates/main_page.php';
    drawMainHeader();
    $obj = new User(1, "alanturing@hotmail.com", "Alan", "Turing");
    echo $obj->name();
?>