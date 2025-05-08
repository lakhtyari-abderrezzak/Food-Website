<?php require_once './views/partials/header.view.php'; ?>

<main class="flex flex-col min-h-screen">
    <div class="flex-grow flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white shadow-md rounded px-8 py-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Forgot Password</h2>

            <?php if (isset($_SESSION['message'])): ?>
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    <?= $_SESSION['message'] ?>
                    <?php unset($_SESSION['message']); ?>
                </div>
            <?php endif; ?>

            <form action="/send-reset-password" method="POST" class="space-y-6">
                <div>
                    <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                        Send Reset Link
                    </button>
                </div>
            </form>

            <div class="text-center mt-4">
                <a href="/login" class="text-blue-600 hover:underline">Back to login</a>
            </div>
        </div>
    </div>
</main>

<?php require_once './views/partials/footer.view.php'; ?>
