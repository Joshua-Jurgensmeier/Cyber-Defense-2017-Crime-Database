<?php
    global $mysqli, $M_host, $M_user, $M_password, $M_database;

    $M_host = 'localhost';
    $M_user = 'crimedb';
    $M_password = 'cdc';
    $M_database = 'crimedb';

    $mysqli = new mysqli($M_host, $M_user, $M_password, $M_database);
    if ($mysqli->connect_errno) {
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
?>
