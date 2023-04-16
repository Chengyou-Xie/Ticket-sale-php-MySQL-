<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $host = "localhost";
    $user = "jimuser";
    $pwd  = "1234";
    $db   = "second_test";
    $mysqli = new mysqli($host, $user, $pwd, $db);

?>