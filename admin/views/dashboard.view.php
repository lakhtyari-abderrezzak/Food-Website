<?php require_once 'partials/header.view.php'; ?>

<!-- Dashboard Overview -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 h-64">

    <!-- Total Foods -->
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="flex items-center space-x-4">
            <div class="bg-blue-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </div>
            <div>
                <h4 class="text-gray-600">Total Foods</h4>
                <p class="text-2xl font-bold text-gray-900">24</p> 
            </div>
        </div>
    </div>

    <!-- Total Categories -->
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="flex items-center space-x-4">
            <div class="bg-green-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <div>
                <h4 class="text-gray-600">Total Categories</h4>
                <p class="text-2xl font-bold text-gray-900">6</p> <!-- Replace 6 with dynamic value -->
            </div>
        </div>
    </div>

    <!-- Total Orders -->
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="flex items-center space-x-4">
            <div class="bg-yellow-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path d="M3 10h11M9 21V8a4 4 0 014-4h7"></path>
                </svg>
            </div>
            <div>
                <h4 class="text-gray-600">Total Orders</h4>
                <p class="text-2xl font-bold text-gray-900">18</p> <!-- Replace 18 with dynamic value -->
            </div>
        </div>
    </div>

</div>

<!-- Welcome message -->
<div class="bg-white p-8 rounded-lg shadow text-center">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to the Admin Dashboard 🎉</h1>
    <p class="text-gray-600 mb-6">Manage your Foods, Categories, and Orders easily here.</p>
    <a href="/admin/foods" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        Manage Foods
    </a>
</div>

<?php require_once 'partials/footer.view.php'; ?>
