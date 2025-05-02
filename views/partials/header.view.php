<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Font Awesome CDN (Latest version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-RXf+QSDCUQs6F1Ujae2t5ZCkFvU0QpXx+I5PywjO1t1hpXk1V9OyZyZ+f7FxGjTk3+7Lr3N9Zb6+czY3rjr3eg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-100">

    <!-- Navbar Section Starts Here -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/">
                        <img class="h-10 w-auto" src="/images/logo.png" alt="Restaurant Logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                    <a href="/categories" class="text-gray-700 hover:text-blue-600 font-medium">Categories</a>
                    <a href="/food" class="text-gray-700 hover:text-blue-600 font-medium">Foods</a>
                    <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/logout" class="text-gray-700 hover:text-blue-600 font-medium">Logout</a>
                    <?php else: ?>
                        <a href="/login" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                        <a href="/register" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Register</a>
                    <?php endif; ?>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                        <i class="fas fa-bars fa-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
            <div class="flex flex-col space-y-2 p-4">
                <a href="/" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                <a href="/categories" class="text-gray-700 hover:text-blue-600 font-medium">Categories</a>
                <a href="/food" class="text-gray-700 hover:text-blue-600 font-medium">Foods</a>
                <a href="/contact" class="text-gray-700 hover:text-blue-600 font-medium">Contact</a>
                <a href="/login" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                <a href="/register"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-center">Register</a>
            </div>
        </div>
    </nav>
    <!-- Navbar Section Ends Here -->