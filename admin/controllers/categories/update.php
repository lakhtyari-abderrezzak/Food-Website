<?php

use Middleware\AuthMiddleware;

require_once './bootstrap.php';

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();

$auth->handle();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'] ?? '';
    $featured = isset($_POST['featured']) ? 1 : 0;
    $active = isset($_POST['active']) ? 1 : 0;

    if (empty($title)) {
        $errors['title'] = 'Title is required';
    }

    $image = $_FILES['image'];

    // chack if we have an old image in the database
    $stmt = $conn->prepare("SELECT image_path FROM categories WHERE id = :id");
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $current = $stmt->fetch(PDO::FETCH_ASSOC);
    $image_name = $current['image_path'];

    // check if we have an image in the request

    if (isset($image) && $image['error'] === UPLOAD_ERR_OK) {
        $image_dir = dirname(__DIR__, 3) . '/images/categories/';
        $tmp_name = $image['tmp_name'];
        $original_name = basename($image['name']);
        $new_image_name = time() . '_' . preg_replace('/[^a-zA-Z0-9.\-_]/', '', $original_name);

        if (move_uploaded_file($tmp_name, $image_dir . $new_image_name)) {
            // Delete old image if exists
            if (!empty($image_name) && file_exists($image_dir . $image_name)) {
                unlink($image_dir . $image_name);
            }
            $imagePath = $new_image_name;
        }

    }else {
        $new_image_name = $image_name;
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: /dashboard/categories/create');
        exit;
    }

    $sql = "UPDATE categories  SET title = :title, image_path = :image, featured = :featured, active = :active WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':title' => $title,
        ':image' => $new_image_name,
        ':featured' => $featured,
        ':active' => $active,
        ':id' => $_POST['id']
    ]);


    $_SESSION['success'] = 'Category Updated successfully';
    header('Location: /dashboard/categories');
    exit;
    
} else {
    require_once './views/404.view.php';
    http_response_code(404);
    exit;
}