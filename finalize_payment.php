<?php
session_start();
include 'db.php';  // Database connection

// Check if the cart is not empty
if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    echo "Error: Cart is empty. Please add items to your cart first.";
    exit();
}

// Handle form data after payment submission
if (isset($_POST['submit_payment'])) {
    // Get user information from the form
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    
    // Sanitize input (basic)
    $card_number = htmlspecialchars($card_number);
    $expiry_date = htmlspecialchars($expiry_date);
    $cvv = htmlspecialchars($cvv);
    
    // Validate the card details (basic validation)
    if (empty($card_number) || empty($expiry_date) || empty($cvv)) {
        echo "Error: Please fill all the payment details.";
        exit();
    }

    // Simulate successful payment processing (for your project)
    try {
        // Here, you would normally integrate with an actual payment gateway API.
        // But for now, let's simulate a successful payment.

        // If payment is successful, redirect to the 'thank you' page
        header("Location: thankyou.php");
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
