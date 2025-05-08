<?php 
require_once './bootstrap.php';
require_once 'views/partials/header.view.php';
?>

<!-- Food Search Section -->
<section class="bg-gray-100 py-10">
    <div class="container mx-auto px-4 text-center">
        <form action="food-search.html" method="POST" class="flex flex-col sm:flex-row gap-4 justify-center">
            <input type="search" name="search" placeholder="Search for Food..." required
                class="px-4 py-2 rounded-md border w-full sm:w-80 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" name="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Search
            </button>
        </form>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Explore Foods</h2>

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            <?php foreach ($featured_foods as $food): ?>
                <a href="foods/<?php echo $food['id']; ?>"
                    class="block bg-gray-100 rounded-lg overflow-hidden hover:shadow-lg transition">
                    <img src="images/pizza.jpg" alt="Pizza" class="w-full h-48 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold">Pizza</h3>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Food Menu Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Food Menu</h2>

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            <?php foreach ($all_foods as $food): ?>
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                    <img src="images/menu-pizza.jpg" alt="Chicken Hawaiian Pizza" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-2">Food Title</h4>
                        <p class="text-blue-600 font-semibold mb-2">$2.3</p>
                        <p class="text-gray-600 mb-4">
                            Made with Italian Sauce, Chicken, and organic vegetables.
                        </p>
                        <a href="order.html"
                            class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Order Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center">
            <a href="/food" class="text-blue-600 hover:underline text-lg">See All Foods</a>
        </div>
    </div>
</section>

<?php require_once 'views/partials/footer.view.php'; ?>