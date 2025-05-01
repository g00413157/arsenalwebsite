<?php
session_start();
include 'db.php';


if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    echo "Error: Cart is empty. Please add items before payment.";
    exit();
}

if (isset($_POST['submit_payment'])) {
  
    $card_number = trim($_POST['card_number'] ?? '');
    $expiry_date = trim($_POST['expiry_date'] ?? '');
    $cvv = trim($_POST['cvv'] ?? '');

  
    if (empty($card_number) || empty($expiry_date) || empty($cvv)) {
        echo "Error: Please fill in all payment details.";
        exit();
    }

   
    if (!preg_match('/^\d{16}$/', $card_number)) {
        echo "Error: Invalid card number format.";
        exit();
    }

    if (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expiry_date)) {
        echo "Error: Invalid expiry date format.";
        exit();
    }

    if (!preg_match('/^\d{3}$/', $cvv)) {
        echo "Error: Invalid CVV format.";
        exit();
    }

  
    try {
        
        unset($_SESSION['cart_items']);

     
        header("Location: thankyou.php");
        exit();
    } catch (Exception $e) {
        echo "Payment processing error: " . $e->getMessage();
    }
}
?>
