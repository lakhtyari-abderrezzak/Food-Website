<?php
require_once './bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $featured = isset($_POST['featured']) ? 1 : 0;
    $active = isset($_POST['active']) ? 1 : 0;

    if (empty($title)) {
        $errors['title'] = "Title is required.";
    }
    if (strlen($description) > 255) {
        $errors['description'] = "Description is long try shorter.";
    }
    if (empty($price) || !is_numeric($price)) {
        $errors['price'] = "Valid price is required.";
    }
    if (empty($category_id) || !is_numeric($category_id)) {
        $errors['category'] = "Valid category ID is required.";
    }
    if ($featured !== 0 && $featured !== 1) {
        $errors['featured'] = "Invalid featured value.";
    }
    if ($active !== 0 && $active !== 1) {
        $errors['active'] = "Invalid active value.";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: /dashboard/foods/edit?id=$id");
        exit;
    }

    // Handle file upload
    $stmt = $conn->prepare("SELECT image_name FROM food WHERE id = ?");
    $stmt->execute([$id]);
    $current = $stmt->fetch(PDO::FETCH_ASSOC);
    $image_name = $current['image_name'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $upload_dir = dirname(__DIR__, 3) . '/images/foods/';
        $tmp_name = $_FILES['image']['tmp_name'];
        $original_name = basename($_FILES['image']['name']);
        $new_image_name = time() . '_' . preg_replace('/[^a-zA-Z0-9.\-_]/', '', $original_name);
    

        if (move_uploaded_file($tmp_name, $upload_dir . $new_image_name)) {
            // Delete old image if exists
            if (!empty($image_name) && file_exists($upload_dir . $image_name)) {
                unlink($upload_dir . $image_name);
            }
            $image_name = $new_image_name;
        }
    }
    // Update food item
    $stmt = $conn->prepare("UPDATE food SET title = ?, description = ?, price = ?, image_name = ?, category_id = ?, featured = ?, active = ? WHERE id = ?");
    $stmt->execute([$title, $description, $price, $image_name, $category_id, $featured, $active, $id]);
    
    $_SESSION['success'] = "Food item updated successfully!";
    header("Location: /dashboard/foods");
    exit;
}else {
    echo "Invalid request.";
    exit;
}