<?php require_once dirname(__DIR__, 2) . '/views/partials/header.view.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-indigo-200">
    <div class="bg-white p-10 rounded-lg shadow-lg text-center max-w-xl">
        <div class="flex justify-center mb-6">
            <svg class="h-16 w-16 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Thank You for Your Order!</h2>
        <p class="text-gray-600 mb-2">We’ve received your order and will start preparing it right away.</p>
        <p class="text-gray-600 mb-6">You’ll receive an email confirmation shortly.</p>
        <a href="/" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition">
            Continue Shopping
        </a>
    </div>
</div>

<?php require_once dirname(__DIR__, 2) . '/views/partials/footer.view.php'; ?>
