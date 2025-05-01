<?php
session_start();
include 'db.php';

if (isset($_POST['submit_payment'])) {
    $card_number = htmlspecialchars($_POST['card_number']);
    $expiry_date = htmlspecialchars($_POST['expiry_date']);
    $cvv = htmlspecialchars($_POST['cvv']);

    if (empty($card_number) || empty($expiry_date) || empty($cvv)) {
        echo "Error: Please fill all the payment details.";
        exit();
    }

    // Save cart to order_summary
    $_SESSION['order_summary'] = $_SESSION['cart_items'] ?? [];

    // Clear the cart
    unset($_SESSION['cart_items']);

    // Redirect to thank you page
    header("Location: thankyou.php");
    exit();
}
?>
