<?php
session_start();

$cart_count = 0;

if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item) {
        if (is_array($item) && isset($item['quantity'])) {
            $cart_count += $item['quantity'];
        }
    }
}

// Return the cart count as JSON
header('Content-Type: application/json');
echo json_encode(['count' => $cart_count]);
?>
