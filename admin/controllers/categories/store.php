<?php 

use Middleware\AuthMiddleware;

require_once './bootstrap.php';

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();

$auth->handle();

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'] ?? '';
    $featured = isset($_POST['featured']) ? 1 : 0;
    $active = isset($_POST['active']) ? 1 : 0;

    if (empty($title)) {
        $errors['title'] = 'Title is required';
    }
    
    $image = $_FILES['image'];

    if(isset($image) && $image['error'] === UPLOAD_ERR_OK) {
        $image_dir = dirname(__DIR__, 3) . '/images/categories/';
        $tmp_name = $image['tmp_name'];
        $original_name = basename($image['name']);
        $new_image_name = time() . '_' . preg_replace('/[^a-zA-Z0-9.\-_]/', '', $original_name);
        $imagePath = $image_dir . $new_image_name;
        
    } else {
        $_SESSION['errors']['image'] = "Image is required";
        header("Location: /dashboard/categories/create");
        exit();
    }
    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        header('Location: /dashboard/categories/create');
        exit;
    }

    move_uploaded_file($tmp_name, $imagePath);

    $sql = "INSERT INTO categories (title, image_path, featured, active) VALUES (:title, :image, :featured, :active)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':image' => $new_image_name,
        ':featured' => $featured,
        ':active' => $active
    ]);

    $_SESSION['success'] = 'Category created successfully';
    header('Location: /dashboard/categories');
    exit();
}