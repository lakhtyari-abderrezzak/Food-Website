<?php if (isset($_SESSION['success'])): ?>
    <div class="max-w-xl mx-auto mt-4 bg-green-100 text-green-800 px-4 py-3 rounded shadow">
        <?= $_SESSION['success'] ?>
        <?php unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>