<?php

require_once dirname(__DIR__) . '/partials/header.view.php';
?>

<main class="flex flex-col min-h-screen">
    <div class="flex-grow flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white shadow-md rounded px-8 py-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Reset Password</h2>
            <form action="/process-reset-password" method="POST" class="space-y-6">
                <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">
                <div>
                    <label for="password" class="block text-gray-700 mb-2">New Password</label>
                    <input type="password" name="password" id="password" 
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                    <?php if (isset($_SESSION['reset_errors']['password'])): ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['reset_errors']['password']; ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                    <?php if (isset($_SESSION['reset_errors']['password_confirmation'])): ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['reset_errors']['password_confirmation']; ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
require_once dirname(__DIR__) . '/partials/footer.view.php';
?>