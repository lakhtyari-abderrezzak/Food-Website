<?php
require_once 'views/partials/header.view.php';
?>

<div class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Create an Account</h2>

        <form action="/register" method="POST" class="space-y-5">
            <div>
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="<?php echo isset($_SESSION['old']['name']) ? htmlspecialchars($_SESSION['old']['name']) : ''; ?>"
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if (isset($_SESSION['errors']['name'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['errors']['name']; ?></p>
                <?php endif; ?>
            </div>

            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="<?php echo isset($_SESSION['old']['email']) ? htmlspecialchars($_SESSION['old']['email']) : ''; ?>"
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

            <div>
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <?php if (isset($_SESSION['errors']['password_confirmation'])): ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo $_SESSION['errors']['password_confirmation']; ?></p>
                <?php endif; ?>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Register
            </button>
        </form>

        <p class="text-center text-gray-600 text-sm mt-6">
            Already have an account?
            <a href="/login" class="text-blue-600 hover:underline">Login here</a>
        </p>
    </div>
</div>

<?php
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>
<?php require_once 'views/partials/footer.view.php'; ?>