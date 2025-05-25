<?php

require_once './bootstrap.php';
require_once 'views/partials/header.view.php';


?>
<div class="container h-64 py-16">
    <div class="max-w-5xl  my-10 mx-auto p-6 bg-white shadow-md mt-10 rounded">
        <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

        <?php if (count($cartItems) === 0): ?>
            <p class="text-gray-600">Your cart is empty. <a href="/food" class="text-blue-600 underline">Browse foods</a>.
            </p>
        <?php else: ?>
            <table class="w-full mb-6">
                <thead>
                    <tr class="text-left border-b">
                        <th class="py-2">Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $index => $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        ?>
                        <tr class="border-b">
                            <td class="py-2"><?= htmlspecialchars($item['title']) ?></td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td>
                                <form method="POST" action="/update-cart" class="flex items-center space-x-2">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1"
                                        class="w-16 border rounded px-2 py-1 text-center">
                                    <button type="submit" class="text-blue-600 hover:underline">Update</button>
                                </form>
                            </td>
                            <td>$<?= number_format($subtotal, 2) ?></td>
                            <td>
                                <form method="POST" action="remove-from-cart">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <button type="submit" class="text-red-500 hover:underline">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-right text-lg font-semibold">
                Total: $<?= number_format($total, 2) ?>
            </div>

            <div class="mt-6 flex justify-between">
                <a href="/food" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Continue Shopping</a>
                <a href="/checkout" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Proceed to
                    Checkout</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once './views/partials/footer.view.php'; ?>