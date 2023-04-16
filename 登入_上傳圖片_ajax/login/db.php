<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $host = "127.0.0.1";
    $user = "jimuser";
    $pwd  = "1234";
    $db   = "addressbook";
    $mysqli = new mysqli($host, $user, $pwd, $db);
?>