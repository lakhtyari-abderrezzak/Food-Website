<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<nav class="bg-blue-600 p-4 mb-8">
    <div class="container mx-auto flex justify-between">
        <div class="text-white font-bold text-xl">Food Website Admin</div>
        <div class="space-x-4">
            <a href="/admin" class="text-white hover:underline">Dashboard</a>
            <a href="/admin/foods" class="text-white hover:underline">Foods</a>
            <a href="/admin/categories" class="text-white hover:underline">Categories</a>
            <a href="/admin/orders" class="text-white hover:underline">Orders</a>
            <a href="/logout" class="text-white hover:underline">Logout</a>
        </div>
    </div>
</nav>
<div class="container mx-auto">
