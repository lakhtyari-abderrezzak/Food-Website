<?php
require_once 'admin/views/partials/header.view.php';
?>

<div class="max-w-2xl mx-auto bg-white shadow-md rounded px-8 py-6 mt-10">
    <h2 class="text-2xl font-bold mb-6">Edit Food Item</h2>
    <form action="/dashboard/foods/update" method="POST" enctype="multipart/form-data" class="space-y-5">
        <input type="hidden" name="id" value="<?= htmlspecialchars($food['id']) ?>">

        <div>
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" value="<?= htmlspecialchars($food['title']) ?>"
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500"
                >
            <?php if (isset($_SESSION['errors']['title'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($_SESSION['errors']['title']) ?></p>
            <?php unset($_SESSION['errors']['title']); ?>
            <?php endif; ?>
        </div>

        <div>
            <label class="block text-gray-700">Description</label>
            <textarea name="description" rows="4"
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500"><?= htmlspecialchars($food['description']) ?></textarea>
            <?php if (isset($_SESSION['errors']['description'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($_SESSION['errors']['description']) ?></p>
            <?php unset($_SESSION['errors']['description']); ?>
            <?php endif; ?>
        </div>

        <div>
            <label class="block text-gray-700">Price ($)</label>
            <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($food['price']) ?>"
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-500"
                >
            <?php if (isset($_SESSION['errors']['price'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($_SESSION['errors']['price']) ?></p>
            <?php unset($_SESSION['errors']['price']); ?>
            <?php endif; ?>
        </div>

        <div>
            <label class="block text-gray-700">Current Image</label>
            <?php if ($food['image_name']): ?>
                <img src="<?= '/images/foods/' . htmlspecialchars($food['image_name']) ?>"
                    alt="<?= htmlspecialchars($food['title']) ?>" class="w-32 h-32 object-cover rounded mb-2">
            <?php else: ?>
                <p class="text-sm text-gray-500">No image uploaded.</p>
            <?php endif; ?>
            <input type="file" name="image" class="block mt-2">
        </div>

        <div>
            <label class="block text-gray-700">Category</label>
            <select name="category_id" id="">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= htmlspecialchars($category['id']) ?>" <?= $food['category_id'] == $category['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['title']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($_SESSION['errors']['category_id'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($_SESSION['errors']['category_id']) ?></p>
            <?php unset($_SESSION['errors']['category_id']); ?>
            <?php endif; ?>
        </div>

        <div class="flex items-center gap-4">
            <label class="flex items-center">
                <input type="checkbox" name="featured" value="Yes" <?= $food['featured'] === 1 ? 'checked' : '' ?>>
                <span class="ml-2 text-gray-700">Featured</span>
                <?php if (isset($_SESSION['errors']['featured'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($_SESSION['errors']['featured']) ?></p>
                <?php unset($_SESSION['errors']['featured']); ?>
                <?php endif; ?>
            </label>

            <label class="flex items-center">
                <input type="checkbox" name="active" value="Yes" <?= $food['active'] === 1 ? 'checked' : '' ?>>
                <span class="ml-2 text-gray-700">Active</span>
                <?php if (isset($_SESSION['errors']['active'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?= htmlspecialchars($_SESSION['errors']['active']) ?></p>
                <?php unset($_SESSION['errors']['active']); ?>
                <?php endif; ?>
            </label>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Update Food
            </button>
        </div>
    </form>
</div>