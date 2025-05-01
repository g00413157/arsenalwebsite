<?php
session_start();
include 'db.php';

// Get the stored order summary
$order_items = $_SESSION['order_summary'] ?? [];

if (empty($order_items)) {
    echo "Error: No items found in your recent order.";
    exit();
}

$total_price = 0;
$cart_details = [];

foreach ($order_items as $item_id => $item_info) {
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
            'price' => $item_price,
            'quantity' => $quantity,
            'total_price' => $item_total_price,
            'image_url' => $item['image_url'],
        ];
    }
}

// Optional: Clear order summary after use
unset($_SESSION['order_summary']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You - AWFC Merchandise</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styless.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="thank-you-container">
    <h1>Thank You for Your Order!</h1>
    <p>Your order has been successfully placed. Here are the items you just bought:</p>

    <table class="thank-you-table">
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
                    <td><img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="" width="60"></td>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>€<?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>€<?php echo number_format($item['total_price'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><strong>Total Price: €<?php echo number_format($total_price, 2); ?></strong></p>
    <p>You will receive an email confirmation shortly.</p>
    <p><a href="awfcInventory.php">Return to Inventory</a></p>
</div>

</body>
</html>
