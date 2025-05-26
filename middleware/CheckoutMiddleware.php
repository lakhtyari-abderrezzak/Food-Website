<?php 


namespace Middleware;

class CheckoutMiddleware
{
    public function handle()
    {

        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            header("Location: /cart");
            $_SESSION['message'] = "Please add items to your cart before proceeding to checkout.";
            exit();
        }
    }
}
