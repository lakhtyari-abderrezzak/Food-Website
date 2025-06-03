<?php
function isActive($path)
{
    // Check if the current page matches the given path
    $currentPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if ($path === '/') {
        return $currentPage === '/' ? 'text-teal-800 font-semibold' : 'hover:text-teal-600';
    }

    return str_starts_with($currentPage, $path ) ? 'text-teal-800 font-semibold' : 'hover:text-teal-600';
}

$cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant Website</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="bg-slate-100 text-slate-800">

    <!-- Header / Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" aria-label="Go to homepage">
                        <img src="/images/logo.png" alt="Restaurant Logo" class="h-10 w-auto">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="<?= isActive('/') ?> font-medium">Home</a>
                    <a href="/categories" class="<?= isActive('/categories') ?> font-medium">Categories</a>
                    <a href="/food" class="<?= isActive('/food') ?> font-medium">Foods</a>
                    <a href="/contact" class="<?= isActive('/contact') ?> font-medium">Contact</a>
                </div>

                <!-- Cart & Auth (Desktop) -->
                <div class="hidden md:flex items-center space-x-6">
                    <!-- Cart -->
                    <a href="/cart" class="relative" aria-label="View cart">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <?php if ($cartCount > 0): ?>
                            <span
                                class="absolute -top-2 -right-2 bg-rose-500 text-white text-xs px-1.5 py-0.5 rounded-full">
                                <?= htmlspecialchars($cartCount) ?>
                            </span>
                        <?php endif; ?>
                    </a>

                    <!-- Auth -->
                    <?php if (isset($_SESSION['user'])): ?>
                        <a href="/logout" class="hover:text-teal-600 font-medium">Logout</a>
                    <?php else: ?>
                        <a href="/login" class="hover:text-teal-600 font-medium">Login</a>
                        <a href="/register" class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700 transition">
                            Register
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-slate-700" aria-label="Toggle mobile menu">
                    <i class="fas fa-bars fa-2x"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md transition-all">
            <div class="flex flex-col space-y-2 p-4">
                <a href="/" class="<?= isActive('/') ?> font-medium">Home</a>
                <a href="/categories" class="<?= isActive('/categories') ?> font-medium">Categories</a>
                <a href="/food" class="<?= isActive('/food') ?> font-medium">Foods</a>
                <a href="/contact" class="<?= isActive('/contact') ?> font-medium">Contact</a>
                <a href="/cart" class="hover:text-teal-600 font-medium">
                    <i class="fas fa-shopping-cart mr-1"></i> Cart (<?= htmlspecialchars($cartCount) ?>)
                </a>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="/logout" class="hover:text-teal-600 font-medium">Logout</a>
                <?php else: ?>
                    <a href="/login" class="hover:text-teal-600 font-medium">Login</a>
                    <a href="/register"
                        class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700 text-center transition">
                        Register
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>



    <!-- Main content -->
    <main class="min-h-screen">