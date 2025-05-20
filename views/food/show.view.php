<?php 
require_once 'views/partials/header.view.php';
?>


<?php if (isset($food)) : ?>
    <section class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
            
            <!-- Food Image -->
            <div class="md:w-1/2 h-64 md:h-auto">
                <img src="/images/foods/<?php echo $food['image_name'] ?? 'default.jpg'; ?>"
                     alt="<?php echo htmlspecialchars($food['title']); ?>"
                     class="w-full h-full object-cover">
            </div>

            <!-- Food Details -->
            <div class="p-6 md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">
                    <?= htmlspecialchars($food['title']) ?>
                </h2>
                <p class="text-gray-700 mb-4">
                    <?= htmlspecialchars($food['description']) ?>
                </p>
                <p class="text-xl font-semibold text-green-600 mb-6">
                    $<?= number_format($food['price'], 2) ?>
                </p>
                
                <a href="/" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    ← Back to Home
                </a>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="py-12 bg-gray-100">
        <div class="text-center max-w-xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Food Not Found</h2>
            <p class="text-gray-600">The food item you're looking for doesn't exist or was removed.</p>
            <a href="/" class="inline-block mt-4 text-blue-600 hover:underline">Go to Homepage</a>
        </div>
    </section>
<?php endif; ?>

<?php require_once './views/partials/footer.view.php'; ?>
