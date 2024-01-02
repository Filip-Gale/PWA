<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $baza = "projekt";

    $dbc = mysqli_connect($server, $user, $pass, $baza) or die("Connection failed  " . mysqli_connect_error());


?>