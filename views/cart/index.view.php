<?php
session_start();

require_once './views/partials/header.view.php';    

$_SESSION['cart'] = [['id' => 1, 'name' => 'Pizza', 'price' => 10, 'qty' => 2],];

$cartItems = $_SESSION['cart'] ?? [];
$total = 0;
?>

    <div class="max-w-5xl h-auto my-10 mx-auto p-6 bg-white shadow-md mt-10 rounded">
        <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

        <?php if (count($cartItems) === 0): ?>
            <p class="text-gray-600">Your cart is empty. <a href="/food" class="text-blue-600 underline">Browse foods</a>.</p>
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
                        $subtotal = $item['price'] * $item['qty'];
                        $total += $subtotal;
                    ?>
                        <tr class="border-b">
                            <td class="py-2"><?= htmlspecialchars($item['name']) ?></td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td>
                                <form method="POST" action="update-cart.php" class="flex items-center space-x-2">
                                    <input type="hidden" name="index" value="<?= $index ?>">
                                    <input type="number" name="qty" value="<?= $item['qty'] ?>" min="1" class="w-16 border rounded px-2 py-1 text-center">
                                    <button type="submit" class="text-blue-600 hover:underline">Update</button>
                                </form>
                            </td>
                            <td>$<?= number_format($subtotal, 2) ?></td>
                            <td>
                                <form method="POST" action="remove-from-cart.php">
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
                <a href="/checkout.php" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Proceed to Checkout</a>
            </div>
        <?php endif; ?>
    </div>

<?php require_once './views/partials/footer.view.php'; ?>