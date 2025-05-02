<?php require './views/partials/header.view.php'; ?>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-10">Explore Foods</h2>

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            <?php foreach ($categories as $category) : ?>
                <a href="/categories/show?id=<?php echo $category['id']; ?>" class="block bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                    <div class="relative h-48 overflow-hidden">
                        <img src="/images/<?php echo htmlspecialchars($category['image_path']) ?? 'momo.jpg'; ?>" 
                             alt="<?php echo htmlspecialchars($category['title']); ?>" 
                             class="object-cover w-full h-full">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($category['title']); ?></h3>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require 'views/partials/footer.view.php'; ?>
