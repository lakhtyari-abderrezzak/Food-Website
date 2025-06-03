<?php require_once dirname(__DIR__, 2) . '/views/partials/header.view.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-100 to-pink-200">
    <div class="bg-white p-10 rounded-lg shadow-lg text-center max-w-xl">
        <div class="flex justify-center mb-6">
            <svg class="h-16 w-16 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Order Cancelled</h2>
        <p class="text-gray-600 mb-2">Your order has been successfully cancelled.</p>
        <p class="text-gray-600 mb-6">If this was a mistake or you have questions, feel free to contact us.</p>
        <a href="/" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition">
            Return Home
        </a>
    </div>
</div>

<?php require_once dirname(__DIR__, 2) . '/views/partials/footer.view.php'; ?>
