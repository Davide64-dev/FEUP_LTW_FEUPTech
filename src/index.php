<?php
    include 'database/agent.class.php';
    include 'templates/main_page.php';
    drawMainHeader();
    $obj = new Agent(1, "alanturing@hotmail.com", "Alan", "Turing");
    echo $obj->name();
?>