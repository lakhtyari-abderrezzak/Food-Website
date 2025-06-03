<?php
require_once 'views/partials/header.view.php';
?>

<!-- 🔍 Food Search Section -->
<section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-10">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Find Your Favorite Meal</h2>
        <form method="GET" class="flex flex-col sm:flex-row items-center justify-center gap-4 max-w-md mx-auto">
            <input type="text" name="search" placeholder="Search food..."
                class="border border-gray-300 px-4 py-2 rounded w-full sm:w-auto"
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition">Search</button>
        </form>

        <?php if (!empty($_GET['search'])): ?>
            <div class="text-center mt-4 flex items-center justify-center gap-2">
                <p class="text-gray-600">
                    Showing results for:
                    <strong class="text-indigo-700">"<?= htmlspecialchars($_GET['search']) ?>"</strong>
                </p>
                <a href="/food" title="Clear Search"
                   class="text-red-500 hover:text-red-600 text-lg">
                    <i class="fas fa-xmark"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- 🍽️ Food List Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-10">Our Menu</h2>

        <?php if (!empty($_GET['search']) && empty($foods)): ?>
            <p class="text-center text-gray-500">No foods found matching your search.</p>
        <?php endif; ?>

        <?php if (!empty($foods)): ?>
            <div class="mb-10">
                <ul class="divide-y">
                    <?php foreach ($foods as $food): ?>
                        <li class="py-5 flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex items-center space-x-4 flex-1">
                                <img src="images/foods/<?= htmlspecialchars($food['image_name']) ?>" loading="lazy"
                                    alt="<?= htmlspecialchars($food['title']) ?>" class="w-20 h-20 object-cover rounded border">

                                <div>
                                    <h4 class="text-lg font-semibold"><?= htmlspecialchars($food['title']) ?></h4>
                                    <p class="text-sm text-gray-600"><?= htmlspecialchars($food['description']) ?></p>
                                    <p class="text-blue-600 font-bold mt-1">$<?= number_format($food['price'], 2) ?></p>
                                </div>
                            </div>

                            <form action="/add-to-cart" method="POST" class="flex items-center mt-4 md:mt-0">
                                <input type="hidden" name="food_id" value="<?= $food['id'] ?>">
                                <input type="number" name="quantity" value="1" min="1"
                                    class="border rounded px-2 py-1 w-20 mr-3">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Add to Cart
                                </button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
require_once 'views/partials/footer.view.php';
