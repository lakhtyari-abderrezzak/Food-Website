<?php
require_once './bootstrap.php';
require_once 'views/partials/header.view.php';
?>


<!-- Food Menu Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Our Delicious Foods</h2>

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            <?php foreach ($foods as $food): ?>
                <!-- Single Food Card -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                    <a href="/food/show?id=<?= $food['id'] ?>">
                        <img src="images/foods/<?php echo htmlspecialchars($food['image_name']); ?>"
                            alt="<?php echo htmlspecialchars($food['title']); ?>" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-2">
                            <?php echo htmlspecialchars($food['title']); ?>
                        </h4>
                        <p class="text-blue-600 font-semibold mb-2">
                            $<?php echo number_format($food['price'], 2); ?>
                        </p>
                        <p class="text-gray-600 text-sm mb-4">
                            <?php echo htmlspecialchars($food['description']); ?>
                        </p>
                        <form action="/add-to-cart" method="POST">
                            <input type="hidden" name="food_id" value="<?= $food['id'] ?>">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit">Add to Cart</button>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>


        </div>

        <div class="mt-12 text-center">
            <a href="#" class="text-blue-600 hover:underline text-lg">Load More Foods</a>
        </div>
    </div>
</section>

<?php require_once 'views/partials/footer.view.php'; ?>