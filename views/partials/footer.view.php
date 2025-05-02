<footer class="bg-gray-900 text-gray-300 py-8">
    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">

        <!-- Left Side -->
        <div class="text-center md:text-left mb-4 md:mb-0">
            <p class="text-sm">&copy; <?php echo date('Y'); ?> All rights reserved. Designed By <a href="#"
                    class="text-blue-400 hover:underline"> Abdo Hizo</a></p>
        </div>

        <!-- Right Side - Social Icons -->
        <div class="flex space-x-6">
            <a href="#" target="_blank" class="hover:text-white">
                <img src="https://img.icons8.com/fluent/24/000000/facebook-new.png" alt="Facebook" class="h-6 w-6">
            </a>
            <a href="#" target="_blank" class="hover:text-white">
                <img src="https://img.icons8.com/fluent/24/000000/instagram-new.png" alt="Instagram" class="h-6 w-6">
            </a>
            <a href="#" target="_blank" class="hover:text-white">
                <img src="https://img.icons8.com/fluent/24/000000/twitter.png" alt="Twitter" class="h-6 w-6">
            </a>
        </div>

    </div>
</footer>


<script>
    // Mobile menu toggle
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

</body>

</html>