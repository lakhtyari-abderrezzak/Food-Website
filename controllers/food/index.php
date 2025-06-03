<?php
require_once './config.php';



$query = "
    SELECT 
        c.id AS category_id,
        c.title AS category_title,
        f.id AS food_id,
        f.title AS food_title,
        f.description,
        f.price,
        f.image_name
    FROM categories c
    LEFT JOIN food f ON f.category_id = c.id
    ORDER BY c.title, f.title
";

$stmt = $conn->query($query);

$foodsByCategory = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $categoryTitle = $row['category_title'];

    if (!isset($foodsByCategory[$categoryTitle])) {
        $foodsByCategory[$categoryTitle] = [];
    }

    // Only add food if it exists (in case category has no food yet)
    if (!empty($row['food_id'])) {
        $foodsByCategory[$categoryTitle][] = [
            'id' => $row['food_id'],
            'title' => $row['food_title'],
            'description' => $row['description'],
            'price' => $row['price'],
            'image_name' => $row['image_name']
        ];
    }
}

// Include the view to display the food items
require './views/food/index.view.php';
