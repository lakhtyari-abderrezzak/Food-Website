<?php

require 'config.php';

// Fetching featured foods from the database
$stmt = $conn->prepare("SELECT * FROM food WHERE featured = true ORDER BY id DESC  LIMIT 3");
$stmt->execute();
$featured_foods = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetching all foods from the database
$stmt = $conn->prepare("SELECT * FROM food ORDER BY id DESC LIMIT 6");  
$stmt->execute();
$all_foods = $stmt->fetchAll(PDO::FETCH_ASSOC);


require './views/welcome.view.php';