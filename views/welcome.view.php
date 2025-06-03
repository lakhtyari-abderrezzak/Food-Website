<?php
require_once './bootstrap.php';
require_once 'views/partials/header.view.php';
?>


<!-- 🗂️ Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Explore Foods</h2>
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            <?php foreach ($featured_foods as $food): ?>
                <a href="foods/show?id=<?= $food['id']; ?>"
                   class="block bg-white rounded-lg shadow hover:shadow-xl transition duration-300">
                    <img src="images/foods/<?= $food['image_name'] ?>" alt="<?= $food['title'] ?>"
                         class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800"><?= $food['title'] ?></h3>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 🍽️ Food Menu Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Food Menu</h2>

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($all_foods as $food): ?>
                <div class="bg-white rounded-xl shadow hover:shadow-2xl transition overflow-hidden">
                    <a href="food/show?id=<?= $food['id'] ?>">
                        <img src="images/foods/<?= $food['image_name'] ?>" alt="<?= $food['title'] ?>"
                             class="w-full h-52 object-cover">
                    </a>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">
                            <a href="food/show?id=<?= $food['id'] ?>" class="hover:text-indigo-600 transition">
                                <?= $food['title'] ?>
                            </a>
                        </h4>
                        <p class="text-indigo-600 font-semibold mb-1">€<?= $food['price'] ?></p>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            <?= $food['description'] ?>
                        </p>
                        <a href="order.html"
                           class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Order Now
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center">
            <a href="/food" class="text-blue-700 hover:underline text-lg font-medium">See All Foods</a>
        </div>
    </div>
</section>

<?php require_once 'views/partials/footer.view.php'; ?>
