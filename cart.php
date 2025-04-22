<?php
session_start();

// Check if cart_items session exists and has data
$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item_id => $item_info) {
        $cart_count += $item_info['quantity'];  // Sum up the quantities
    }
}
// Include database connection
include 'db.php';  // Make sure this is the correct path to your db connection file

// Check if the cart session exists
if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = [];
}

// Cart handling logic (add, remove, and update cart items)
if (isset($_POST['add_to_cart'])) {
    $item_id = $_POST['add_to_cart'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1; // Default quantity is 1

    // If the cart already exists, update it, otherwise create a new one
    if (isset($_SESSION['cart_items'][$item_id])) {
        // Increase the quantity if the item is already in the cart
        $_SESSION['cart_items'][$item_id]['quantity'] += $quantity;
    } else {
        // Add the item with the specified quantity
        $_SESSION['cart_items'][$item_id] = ['quantity' => $quantity];
    }
}

// Handle removing items from the cart
if (isset($_POST['remove_from_cart'])) {
    $item_id = $_POST['remove_from_cart'];
    unset($_SESSION['cart_items'][$item_id]);
}

// Handle updating the quantity of items
if (isset($_POST['update_quantity'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    if ($quantity <= 0) {
        unset($_SESSION['cart_items'][$item_id]); // Remove item if quantity is 0 or less
    } else {
        $_SESSION['cart_items'][$item_id]['quantity'] = $quantity;
    }
}

// Calculate the total price
$total_price = 0;
foreach ($_SESSION['cart_items'] as $item_id => $item) {
    // Fetch the item details from the database
    $query = "SELECT * FROM merchandise WHERE item_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item_data = $result->fetch_assoc();

    // Calculate the total price for the item
    $total_price += $item_data['price'] * $item['quantity']; // Access the 'quantity' correctly
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styless.css"> <!-- Make sure this CSS file includes the card styles -->
</head>

<body>
    <main>
        <?php include 'headerAfter.php'; ?>

        <div class="cart-wrapper">
            <div class="cart-card">
                <h2>Your Cart</h2>

                <?php if (count($_SESSION['cart_items']) > 0): ?>
                    <ul class="cart-list">
                        <?php foreach ($_SESSION['cart_items'] as $item_id => $item): ?>
                            <?php
                            $query = "SELECT * FROM merchandise WHERE item_id = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("i", $item_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $item_data = $result->fetch_assoc();
                            ?>
                            <li class="cart-item">
                                <img src="<?php echo htmlspecialchars($item_data['image_url']); ?>" class="cart-item-image"
                                    alt="<?php echo htmlspecialchars($item_data['merch_name']); ?>">

                                <div class="cart-item-info">
                                    <p class="item-name"><?php echo htmlspecialchars($item_data['merch_name']); ?></p>
                                    <p class="item-price">€<?php echo number_format($item_data['price'], 2); ?></p>

                                    <form action="cart.php" method="POST" class="cart-form">
                                        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                                        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1"
                                            class="cart-input">
                                        <button type="submit" name="update_quantity" class="cart-btn small">Update</button>
                                    </form>

                                    <form action="cart.php" method="POST">
                                        <input type="hidden" name="remove_from_cart" value="<?php echo $item_id; ?>">
                                        <button type="submit" class="cart-btn small secondary">Remove</button>
                                    </form>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="cart-total">
                        <p>Total: <strong>€<?php echo number_format($total_price, 2); ?></strong></p>
                    </div>

                    <div class="cart-actions">
                        <a href="awfcInventory.php" class="cart-btn secondary">Continue Shopping</a>
                        <a href="checkout.php" class="cart-btn">Checkout</a>
                    </div>

                <?php else: ?>
                    <p class="empty-cart-msg">Your cart is empty.</p>
                    <div class="cart-actions">
                        <a href="awfcInventory.php" class="cart-btn secondary">Continue Shopping</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>


</body>

</html>