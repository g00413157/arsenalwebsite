<?php
session_start();
include 'db.php'; // ✅ Include DB early for $conn

// Calculate cart count
$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item_info) {
        $cart_count += $item_info['quantity'];
    }
}

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item_id = $_POST['add_to_cart'];

    // Fetch item details to validate and retrieve info
    $stmt = $conn->prepare("SELECT item_id, merch_name, price FROM merchandise WHERE item_id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $item_result = $stmt->get_result();

    if ($item_result->num_rows === 1) {
        $item = $item_result->fetch_assoc();

        if (!isset($_SESSION['cart_items'][$item_id])) {
            $_SESSION['cart_items'][$item_id] = [
                'merch_name' => $item['merch_name'],
                'price' => $item['price'],
                'quantity' => 1
            ];
        } else {
            $_SESSION['cart_items'][$item_id]['quantity'] += 1;
        }

        // Redirect to avoid form resubmission
        $query_string = $_GET;
        $query_string['added'] = 'true';
        header("Location: awfcInventory.php?" . http_build_query($query_string));
        exit;
    }
}

// Filters
$merch_name = $_GET['merch_name'] ?? '';
$status = $_GET['status'] ?? '';

// Build filtered query
$query = "SELECT * FROM merchandise WHERE 1";
$params = [];
$types = '';

if (!empty($merch_name)) {
    $query .= " AND merch_name LIKE ?";
    $params[] = "%" . $merch_name . "%";
    $types .= 's';
}
if (!empty($status)) {
    $query .= " AND status = ?";
    $params[] = $status;
    $types .= 's';
}

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AWFC Merchandise Inventory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <h1>AWFC Merchandise Inventory</h1>

    <?php if (isset($_GET['added']) && $_GET['added'] == 'true'): ?>
        <p style="color: green;"><strong>Item added to cart!</strong></p>
    <?php endif; ?>

    <!-- Filter Form -->
    <form method="GET" action="awfcInventory.php">
        <label for="merch_name"><b>Merchandise Name:</b></label>
        <input type="text" name="merch_name" id="merch_name" value="<?php echo htmlspecialchars($merch_name); ?>"
            placeholder="Search by name...">

        <label for="status"><b>Status:</b></label>
        <select name="status" id="status">
            <option value="">Select Status</option>
            <option value="Available" <?php echo ($status == 'Available') ? 'selected' : ''; ?>>Available</option>
            <option value="Out of Stock" <?php echo ($status == 'Out of Stock') ? 'selected' : ''; ?>>Out of Stock
            </option>
        </select>

        <button type="submit">Apply Filters</button>
    </form>

    <!-- Product Cards -->
    <div class="inventory-container">
  <?php while($row = $result->fetch_assoc()): ?>
    <div class="merch-card--horizontal">
      <img 
        src="<?php echo htmlspecialchars($row['image_url']); ?>" 
        alt="<?php echo htmlspecialchars($row['merch_name']); ?>" 
        class="merch-image--horizontal"
      >

      <div class="merch-info--horizontal">
        <h3><?php echo htmlspecialchars($row['merch_name']); ?></h3>
        <p><?php echo htmlspecialchars($row['description']); ?></p>
        <p class="price">€<?php echo number_format($row['price'], 2); ?></p>
        

        <?php if($row['status'] == 'Available' && $row['stock'] > 0): ?>
          <form 
            method="POST" 
            action="awfcInventory.php?<?php echo htmlspecialchars(http_build_query($_GET)); ?>" 
            class="cart-form--horizontal"
          >
            <input 
              type="hidden" 
              name="add_to_cart" 
              value="<?php echo $row['item_id']; ?>"
            >
            <button type="submit" class="add-to-cart-btn--clear">
              Add to Cart
            </button>
          </form>
        <?php else: ?>
          <p class="out-of-stock">Out of Stock</p>
        <?php endif; ?>
      </div>
    </div>
  <?php endwhile; ?>
</div>

  



</body>

</html>