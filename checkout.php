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
    $quantity = $item_info['quantity'];

   
    $stmt = $conn->prepare("SELECT * FROM merchandise WHERE item_id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if ($item) {
        $item_price = $item['price'];
        $item_total_price = $item_price * $quantity;
        $total_price += $item_total_price;

        $cart_details[] = [
            'name' => $item['merch_name'],
            'price' => $item['price'],
            'quantity' => $quantity,
            'total_price' => $item_total_price,
            'image_url' => $item['image_url'],
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - AWFC Merchandise</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styless.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <br>
    <h1>Checkout</h1>

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
                                <img src="<?php echo htmlspecialchars($item['image_url']); ?>"
                                    alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 60px; height: auto;">
                            </td>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>€<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>€<?php echo number_format($item['total_price'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p><strong>Total Price: €<?php echo number_format($total_price, 2); ?></strong></p>
       
        <form method="POST" action="payment.php" class="checkout-form">
            <h3>Enter Your Information</h3>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="address">Shipping Address:</label>
            <textarea id="address" name="address" required></textarea><br>

            <button type="submit" name="submit_payment">Proceed to Payment</button>
        </form>
        </div>
    </div>
</body>

</html>