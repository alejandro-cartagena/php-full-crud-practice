<?php

$dbhost = "localhost";
$dbname = "practice_db";
$dsn = "mysql:host=$dbhost;dbname=$dbname";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection to DB failed: " . $e;
}