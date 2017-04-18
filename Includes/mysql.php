<?php
    
    include 'dbconf.php'

    $dsn = "mysql:host=$M_host;dbname=$M_database;charset='utf8'";
    
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $M_user, $M_password, $opt);
    
?>
