<?php 
require_once './bootstrap.php';
require_once 'views/partials/header.view.php';
?>


<?php if (isset($category)): ?>
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10"><?php echo htmlspecialchars($category['title']); ?></h2>

            <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                <?php foreach ($foods as $food): ?>
                    <a href="/food/show?id=<?php echo $food['id']; ?>"
                        class="block bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                        <div class="relative h-48 overflow-hidden">
                            <img src="/images/<?php echo $food['image_name'] ?? 'momo.jpg'; ?>"
                                alt="<?php echo htmlspecialchars($food['title']); ?>" class="object-cover w-full h-full">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($food['title']); ?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10">Category Not Found</h2>
            <p class="text-center">The category you are looking for does not exist.</p>
        </div>
    </section>
<?php endif; ?>

<?php if (empty($foods)): ?>
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10">No Foods Available</h2>
            <p class="text-center">There are no foods available in this category.</p>
        </div>
    </section>
<?php endif; ?>

<?php require './views/partials/footer.view.php';