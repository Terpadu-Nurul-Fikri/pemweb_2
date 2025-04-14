<?php 
    $host = 'localhost';
    $db = 'dbsiang';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // Create data source name (dsn)
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    // Create PDO connection object
    $dbh = new PDO($dsn, $user, $pass, $opt);
?>