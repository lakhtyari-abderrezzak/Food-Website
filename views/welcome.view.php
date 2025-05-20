<?php
require_once './bootstrap.php';
require_once 'views/partials/header.view.php';
?>

<!-- Food Search Section -->
<section class="bg-gray-100 py-10">
    <div class="container mx-auto px-4 text-center">
         <div class="mb-4 flex items-center gap-4">
        <form method="GET" class="mb-4">
            <input type="text" name="search" placeholder="Search food..." class="border px-3 py-2 rounded"
                value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
        </form>
    </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Explore Foods</h2>

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            <?php foreach ($featured_foods as $food): ?>
                <a href="foods/show?id=<?php echo $food['id']; ?>"
                    class="block bg-gray-100 rounded-lg overflow-hidden hover:shadow-lg transition">
                    <img src="images/foods/<?= $food['image_name'] ?>" alt="<?= $food['title'] ?>"
                        class="w-full h-48 object-cover">
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold"><?= $food['title'] ?> </h3>
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
                    <a href="food/show?id=<?= $food['id'] ?> ">
                        <img src="images/foods/<?= $food['image_name'] ?>" alt="<?= $food['title'] ?> "
                            class="w-full h-48 object-cover">
                    </a>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-2">
                            <a href="food/show?id=<?= $food['id'] ?> ">
                                <?= $food['title'] ?>
                            </a></h4>
                        <p class="text-blue-600 font-semibold mb-2"> <?= $food['price'] ?> </p>
                        <p class="text-gray-600 mb-4">
                            <?= $food['description'] ?>
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