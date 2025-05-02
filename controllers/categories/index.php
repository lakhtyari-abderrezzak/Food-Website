<?php 
require 'config.php';



// Fetch categories from the database
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);



require './views/categories/index.view.php';