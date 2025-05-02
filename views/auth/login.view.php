<?php

require_once 'views/partials/header.view.php';

?>

<div class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Login to Your Account</h2>

        <form action="/login" method="POST" class="space-y-5">
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" 
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if (isset($_SESSION['errors']['email'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['errors']['email']; ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" 
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if (isset($_SESSION['errors']['password'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['errors']['password']; ?></p>
                <?php endif; ?>
            </div>
            <?php if (isset($_SESSION['errors']['login'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['errors']['login']; ?></p>
                <?php endif; ?>
            <div class="flex justify-between items-center text-sm">
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="text-gray-600">Remember Me</label>
                </div>
                <a href="#" class="text-blue-600 hover:underline">Forgot Password?</a>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-6">
            Don't have an account?
            <a href="/register" class="text-blue-600 hover:underline">Register here</a>
        </p>
    </div>
</div>

<?php require_once 'views/partials/footer.view.php'; ?>