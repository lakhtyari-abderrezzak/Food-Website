<?php 
require_once './admin/views/partials/header.view.php'; 
?>
  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">📊 Restaurant Dashboard</h1>

    <!-- Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white shadow p-6 rounded-lg">
        <h2 class="text-lg font-semibold mb-2">Total Orders</h2>
        <p>Today: <strong>124</strong></p>
        <p>This Week: <strong>845</strong></p>
        <p>This Month: <strong>3,412</strong></p>
      </div>
      <div class="bg-white shadow p-6 rounded-lg">
        <h2 class="text-lg font-semibold mb-2">Total Revenue</h2>
        <p>Today: <strong>$2,375</strong></p>
        <p>This Week: <strong>$16,920</strong></p>
        <p>This Month: <strong>$67,480</strong></p>
      </div>
      <div class="bg-white shadow p-6 rounded-lg">
        <h2 class="text-lg font-semibold mb-2">New Signups</h2>
        <p>Today: <strong>18</strong></p>
        <p>This Week: <strong>134</strong></p>
        <p>This Month: <strong>502</strong></p>
      </div>
    </div>

    <!-- Low Stock Alerts -->
    <div class="bg-white shadow p-6 rounded-lg mb-8">
      <h2 class="text-xl font-semibold mb-4">⚠️ Low Stock Alerts</h2>
      <ul class="list-disc pl-6 space-y-1">
        <li>Chicken Breast – 3.2 kg left</li>
        <li>Mozzarella Cheese – 1.5 kg left</li>
        <li>Burger Buns – 12 units left</li>
      </ul>
    </div>

    <!-- Popular Dishes -->
    <div class="bg-white shadow p-6 rounded-lg">
      <h2 class="text-xl font-semibold mb-4">🍽️ Top Ordered Dishes</h2>
      <ol class="list-decimal pl-6 space-y-1">
        <li>Grilled Chicken Salad – 235 orders</li>
        <li>Double Cheeseburger – 198 orders</li>
        <li>Margherita Pizza – 187 orders</li>
        <li>Spaghetti Bolognese – 159 orders</li>
        <li>Tandoori Chicken Wrap – 132 orders</li>
      </ol>
    </div>
  </div>
<?php
require_once './admin/views/partials/footer.view.php';