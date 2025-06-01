<?php 
    require_once 'views/partials/header.view.php';
?>
<div class="container h-64 py-16">

    <div class="max-w-3xl my-10 mx-auto p-6 bg-white shadow-md mt-10 rounded">
    <h2 class="text-2xl font-bold mb-4">Checkout</h2>
    <form action="/process-checkout" method="POST">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" required class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" required class="w-full border px-3 py-2 rounded"></textarea>
        </div>
        <div class="mb-3">
            <label for="payment_method">Payment Method</label>
            <select name="payment_method" id="payment_method" class="w-full border px-3 py-2 rounded">
                <option value="cod">Cash on Delivery</option>
                <option value="collection">Pay on Collection</option>
                <option value="card">Card</option>
            </select>
        </div>
        <p class="mb-4 font-semibold">Total: $<?= number_format($total, 2) ?></p>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Place Order</button>
    </form>
</div>
</div>

<?php 
    require_once 'views/partials/footer.view.php';
?>