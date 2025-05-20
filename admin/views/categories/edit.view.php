<?php 
require_once dirname(__DIR__) . '/partials/header.view.php';
?>

<div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-6">Update Create</h1>
    <form action="/dashboard/categories/update" method="POST" enctype="multipart/form-data" class="space-y-4">
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <div>
            <label for="title" class="block font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="<?= $category['title'] ?>" class="w-full mt-1 px-4 py-2 border rounded">
            <?php if (isset($_SESSION['errors']['title'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $_SESSION['errors']['title'] ?></p>
                <?php unset($_SESSION['errors']['title']); ?>
            <?php endif; ?>
        </div>

        <div>
            <label for="current_image" class="block font-medium text-gray-700">Current Image</label>
            <img src="/images/categories/<?= $category['image_path'] ?>" alt="Current Image" class="w-25 h-auto mb-4">
            <label for="image" class="block font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image" class="w-full mt-1">
            <?php if (isset($_SESSION['errors']['image'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $_SESSION['errors']['image'] ?></p>
                <?php unset($_SESSION['errors']['image']); ?>
            <?php endif; ?>
        </div>

        <div class="flex items-center space-x-4">
            <label class="flex items-center">
                <input type="checkbox" name="featured" class="mr-2" <?= $category['featured'] === 1 ? 'checked' : '' ?> > Featured
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="active" class="mr-2" <?= $category['active'] === 1 ? 'checked' : '' ?>> Active
            </label>
        </div>


        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update
            Category</button>
    </form>
</div>