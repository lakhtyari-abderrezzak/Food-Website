<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Order Confirmation</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
    .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; }
    .header { text-align: center; padding-bottom: 10px; border-bottom: 1px solid #eee; }
    .header h1 { color: #333; }
    .content { margin-top: 20px; }
    .item { margin-bottom: 10px; }
    .item span { display: inline-block; min-width: 120px; }
    .total { margin-top: 20px; font-weight: bold; }
    .footer { font-size: 12px; color: #888; text-align: center; margin-top: 30px; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Thank you for your order!</h1>
    </div>
    <div class="content">
      <p>Hi <?= htmlspecialchars($name) ?>,</p>
      <p>We've received your order. Here's what you ordered:</p>
      <div class="order-items">
        <?php foreach ($cart as $item): ?>
          <div class="item">
            <span><strong><?= htmlspecialchars($item['title']) ?></strong></span>
            <span>Qty: <?= $item['quantity'] ?></span>
            <span>$<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
          </div>
        <?php endforeach; ?>
      </div>
      <p class="total">Total: $<?= number_format($total, 2) ?></p>
      <p>We’ll deliver your order to:</p>
      <p><?= nl2br(htmlspecialchars($address)) ?></p>
      <p>If you have any questions, just reply to this email.</p>
    </div>
    <div class="footer">
      &copy; <?= date('Y') ?> Food App. All rights reserved.
    </div>
  </div>
</body>
</html>
<?php
return ob_get_clean();
?>
