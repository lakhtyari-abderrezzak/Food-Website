<?php
require_once 'admin/views/partials/header.view.php';
?>

<div class="p-6 max-w-6xl mx-auto">
    <?php require_once dirname(__DIR__, 3) . '/views/components/success.view.php' ?>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Food Management</h1>
        <a href="/dashboard/foods/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add
            Food</a>
    </div>

    <div class="mb-4 flex items-center gap-4">
        <form method="GET" class="mb-4">
            <input type="text" name="search" placeholder="Search food..." class="border px-3 py-2 rounded"
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
        </form>
    </div>

    <table class="min-w-full bg-white border border-gray-200 rounded">
        <thead>
            <tr class="bg-gray-100 text-left text-sm font-semibold">
                <th class="py-3 px-4">Image</th>

                <th class="py-3 px-4">
                    <a href="foods?sort_by=title">
                        Name
                        <i
                            class="fa-solid fa-sort <?= (isset($_GET['sort_by']) && $_GET['sort_by'] === 'title') ? 'text-green-600' : 'text-gray-500' ?> cursor-pointer"></i>
                    </a>
                </th>

                <th class="py-3 px-4">
                    <a href="foods?sort_by=category_id">
                        Category
                        <i
                            class="fa-solid fa-sort <?= (isset($_GET['sort_by']) && $_GET['sort_by'] === 'category_id') ? 'text-green-600' : 'text-gray-500' ?> cursor-pointer"></i>
                    </a>
                </th>

                <th class="py-3 px-4">
                    <a href="foods?sort_by=price">
                        Price
                        <i
                            class="fa-solid fa-sort <?= (isset($_GET['sort_by']) && $_GET['sort_by'] === 'price') ? 'text-green-600' : 'text-gray-500' ?> cursor-pointer"></i>
                    </a>
                </th>

                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4">Actions</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($foods as $food): ?>
                <tr class="border-t text-sm">
                    <td class="py-2 px-4"><img src="<?php echo "../images/foods/" . $food['image_name'] ?>" alt="Food"
                            class="rounded-full w-10 h-10"></td>
                    <td class="py-2 px-4"><?php echo $food['title'] ?></td>
                    <td class="py-2 px-4"><?php echo $food['category_name'] ?></td>
                    <td class="py-2 px-4"><?php echo '$' . $food['price'] ?></td>
                    <td class="py-2 px-4"><span
                            class="<?php echo $food['active'] === 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?> px-2 py-1 rounded text-xs"><?php echo $food['active'] ? 'Active' : 'Inactive' ?></span>
                    </td>
                    <td class="py-2 px-4 flex gap-2">
                        <button class="text-blue-600 hover:underline text-sm"><a
                                href="foods/edit?id=<?php echo $food['id'] ?>">Edit</a></button>
                        <form action="foods/delete?id=<?= $food['id'] ?>" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                            <input type="hidden" name="id" value="<?= $food['id'] ?>">
                            <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- Repeat rows -->
        </tbody>
    </table>
</div>