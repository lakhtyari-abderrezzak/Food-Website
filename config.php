<?php 

// Database configuration
$host = 'localhost';
$db = 'food_db';
$username = 'root';
$password = ''; 

// Create a connection to the database


try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}