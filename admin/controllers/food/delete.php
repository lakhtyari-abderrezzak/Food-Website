<?php 

require_once './bootstrap.php';

use Middleware\AuthMiddleware;
require './middleware/AuthMiddleware.php';
$auth = new AuthMiddleware();
$auth->handle();
// Check if the ID is provided
if (!isset($_GET['id'])) {
    header("Location: /dashboard/foods");
    exit;
}

// Fetch the food item from the database
$stmt = $conn->prepare("SELECT * FROM food WHERE id = :id");
$stmt->execute(['id' => $_GET['id']]);
$food = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$food) {
    header("Location: /dashboard/foods");
    exit;
}
// Delete the food item
$stmt = $conn->prepare("DELETE FROM food WHERE id = :id");
$stmt->execute(['id' => $_GET['id']]);
// Delete the image file if it exists
if (!empty($food['image_name'])) {
    $upload_dir = dirname(__DIR__, 3) . '/images/foods/';
    if (file_exists($upload_dir . $food['image_name'])) {
        unlink($upload_dir . $food['image_name']);
    }
}
// Redirect to the food management page with a success message
$_SESSION['success'] = "Food item deleted successfully.";
header("Location: /dashboard/foods");
exit;