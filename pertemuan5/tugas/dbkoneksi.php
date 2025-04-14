<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'db_puskesmas';
$username = 'root';
$password = '';
$port = '3306';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $dbh = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Display error message
    die('Connection failed: ' . $e->getMessage());
}