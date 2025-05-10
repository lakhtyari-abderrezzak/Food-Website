<?php 
require_once dirname(__DIR__, 2) . '/views/partials/header.view.php';
?>

<div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-6">Create Food</h1>

    <form action="/dashboard/foods/store" method="POST" enctype="multipart/form-data" class="space-y-4">
        <div>
            <label for="title" class="block font-medium text-gray-700">Title</label>
            <input type="text" name="title" class="w-full mt-1 px-4 py-2 border rounded" required>
        </div>

        <div>
            <label for="description" class="block font-medium text-gray-700">Description</label>
            <textarea name="description" cols="40" rows="4" class="w-full mt-1 px-4 py-2 border rounded" required></textarea>
        </div>

        <div>
            <label for="price" class="block font-medium text-gray-700">Price</label>
            <input type="number" name="price" step="0.01" class="w-full mt-1 px-4 py-2 border rounded" required>
        </div>

        <div>
            <label for="category_id" class="block font-medium text-gray-700">Category</label>
            <select name="category_id" class="w-full mt-1 px-4 py-2 border rounded" required>
                <option value="">Select Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex items-center space-x-4">
            <label class="flex items-center">
                <input type="checkbox" name="featured" class="mr-2"> Featured
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="active" class="mr-2"> Active
            </label>
        </div>

        <div>
            <label for="image_name" class="block font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image_name" class="w-full mt-1">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Create Food
            </button>
        </div>
    </form>
</div>
