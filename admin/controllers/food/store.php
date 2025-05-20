<?php

require_once './bootstrap.php';
use Middleware\AuthMiddleware;
require './middleware/AuthMiddleware.php';
$auth = new AuthMiddleware();
$auth->handle();

 // fetch all categories from the database
 $categories = $conn->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

// check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image'];
    $featured = isset($_POST['featured']) ? 1 : 0;
    $active = isset($_POST['active']) ? 1 : 0;

    $errors = [];

    // validate the form data
    if(empty($title) || strlen($title) < 3) {
         $errors['title'] = "Title must be at least 3 characters long";
    }
    if(strlen($description) > 255) {
        $errors['description'] = "Description must be less than 255 characters";
    }
    if(!is_numeric($price) || $price <= 0) {
        $errors['price'] = "Price must be a positive number";
    }
    if(empty($category_id)) {
        $errors['category_id'] = "Category is required";
    }
    // check if there are any errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: /dashboard/foods/create");
        exit();
    }
    // check if the image is valid
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = dirname(__DIR__, 3) . '/images/foods/';
        $tmp_name = $_FILES['image']['tmp_name'];
        $original_name = basename($_FILES['image']['name']);
        $new_image_name = time() . '_' . preg_replace('/[^a-zA-Z0-9.\-_]/', '', $original_name);

        // check if the image is valid
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowed_types)) {
            $_SESSION['errors']['image'] = "Invalid image type";
            header("Location: /dashboard/foods/create");
            exit();
        }

    } else {
        $_SESSION['errors']['image'] = "Image is required";
        header("Location: /dashboard/foods/create");
        exit();
    }
    // move the uploaded file to the upload directory
    move_uploaded_file($tmp_name, $upload_dir . $new_image_name);
    $image_name = $new_image_name;
    

    // insert the food into the database
    $stmt = $conn->prepare("INSERT INTO food (title, description, price, category_id, image_name, featured, active) VALUES (?, ?, ?, ?, ?,?, ?)");
    $stmt->execute([$title, $description, $price, $category_id, $image_name, $featured, $active]);

    $_SESSION['success'] = "Food created successfully";
    header("Location: /dashboard/foods");
} 
   
require_once './admin/views/foods/create.view.php';