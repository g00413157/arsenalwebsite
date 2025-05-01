<?php
session_start();
include 'db.php'; 

$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item) {
        $cart_count += $item['quantity'];
    }
}

if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    header("Location: awfcInventory.php"); 
    exit();
}

$cart_items = $_SESSION['cart_items'];
$total_price = 0;
$cart_details = [];

foreach ($cart_items as $item_id => $item_info) {
    $quantity = (int) $item_info['quantity'];

    $stmt = $conn->prepare("SELECT * FROM merchandise WHERE item_id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if ($item) {
        $item_price = (float) $item['price'];
        $item_total_price = $item_price * $quantity;
        $total_price += $item_total_price;

        $cart_details[] = [
            'name' => $item['merch_name'],
            'price' => $item_price,
            'quantity' => $quantity,
            'total_price' => $item_total_price,
            'image_url' => $item['image_url']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - AWFC Merchandise</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styless.css"> 
</head>
<body>
<?php include 'header.php'; ?>

<div class="cart-container">
    <br>
    <h1>Confirm Your Order</h1>
    <div class="checkout-wrapper">
        <div class="cart-items">
            <table class="checkout-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_details as $item): ?>
                        <tr>
                            <td>
                                <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="Item Image" width="50">
                            </td>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>€<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>€<?php echo number_format($item['total_price'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="total-price">Total Price: €<?php echo number_format($total_price, 2); ?></p>
        </div>
    </div>

    <!-- Payment Form -->
    <form method="POST" action="finalize_payment.php" class="payment-form">
        <h3>Enter Your Payment Information</h3>

        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" pattern="\d{16}" title="Card number must be 16 digits" required>

        <label for="expiry_date">Expiry Date (MM/YY):</label>
        <input type="text" id="expiry_date" name="expiry_date" pattern="(0[1-9]|1[0-2])\/\d{2}" title="Expiry must be in MM/YY format" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" pattern="\d{3}" title="CVV must be 3 digits" required>

        <button type="submit" name="submit_payment">Submit Payment</button>
    </form>
</div>

<!-- Optional JavaScript Validation -->
<script>
document.querySelector('.payment-form').addEventListener('submit', function(e) {
    const card = document.getElementById('card_number').value.trim();
    const expiry = document.getElementById('expiry_date').value.trim();
    const cvv = document.getElementById('cvv').value.trim();

    const cardRegex = /^\d{16}$/;
    const expiryRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
    const cvvRegex = /^\d{3}$/;

    if (!cardRegex.test(card) || !expiryRegex.test(expiry) || !cvvRegex.test(cvv)) {
        alert('Please enter valid payment details.');
        e.preventDefault();
    }
});
</script>

</body>
</html>
