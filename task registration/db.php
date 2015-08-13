<?php

$host       = 'localhost';
$dbname     = 'city';  
$username   = 'root';
$password   = '';

try {
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
}