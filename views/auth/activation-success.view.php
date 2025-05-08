<?php 

require_once './views/partials/header.view.php';

?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white p-8 rounded shadow-md max-w-md text-center">
        <h1 class="text-2xl font-bold text-green-600 mb-4">Account Activated!</h1>
        <p class="text-gray-700 mb-6">Your account has been successfully activated. You can now log in.</p>
        <a href="/login"
           class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            Go to Login
        </a>
    </div>
</div>


<?php 

require_once './views/partials/footer.view.php';