<?php require_once 'views/partials/header.view.php'; ?>

<!-- Food Menu Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Our Delicious Foods</h2>

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            
        <?php foreach ($foods as $food) : ?>
    <!-- Single Food Card -->
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
        <img 
            src="images/<?php echo htmlspecialchars($food['image_name']); ?>" 
            alt="<?php echo htmlspecialchars($food['title']); ?>" 
            class="w-full h-48 object-cover"
        >
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
            <a 
                href="order.php?id=<?php echo urlencode($food['id']); ?>" 
                class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
            >
                Order Now
            </a>
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
