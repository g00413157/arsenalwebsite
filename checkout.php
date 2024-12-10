<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CheckOut</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
<?php
$shopping_cart_temp_table = isset($_POST["shopping_cart"]) ? $_POST["shopping_cart"] : "";
$user_id = isset($_POST["username"]) ? $_POST["username"] : "";
$total_price = isset($_POST["total_price"]) ? $_POST["total_price"] : "";

$conn = new mysqli("localhost", "root", "", "arsenalwebsitedb");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Fetch items in the shopping cart
$sql_items = "SELECT item_id, quantity FROM $shopping_cart_temp_table ORDER BY item_id";
$items_result = $conn->query($sql_items);

// Insert new order
$stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount) VALUES (?, ?)");
$stmt->bind_param("dd", $user_id, $total_price);

if ($stmt->execute()) {
    $order_id = $conn->insert_id; // Retrieve the ID of the inserted order
} else {
    die("Error: " . $stmt->error);
}
$stmt->close();

// Query for displaying merchandise details
$sql_statement = "SELECT m.merch_name, m.price, t.quantity, t.item_id, m.image_url, m.description 
    FROM $shopping_cart_temp_table t 
    JOIN merchandise m ON t.item_id = m.item_id";
$result = $conn->query($sql_statement);
echo "<style>
    #table-container {
        margin: auto;
        border-collapse: collapse;
        width: 80%;
        text-align: center;
    }
    #table-container th, #table-container td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    #table-container th {
        background-image: linear-gradient(to right, #a0f1eb, #ca94ff);
        color: #000;
        padding: 10px;
    }
    #table-container td img {
        width: 100px;
        height: auto;
    }
    #table-container td {
        padding: 10px;
    }
    .cart-btn {
        padding: 8px 15px;
        margin-top: 5px;
        background-color: #ca94ff;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    .cart-btn:hover {
        background-color: #9f76c4;
    }
    p {
        text-align: center;
        font-size: 18px;
    }
</style>";

// Display order details
echo "<br><h1><b>ORDER HAS BEEN MADE</b></h1><br>";
echo "<table id='table-container' style='width: 90%;'>";
echo "<tr>
    <th>Image</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Subtotal</th>
</tr>";

$stmt = $conn->prepare("INSERT INTO order_item (order_id, item_id, quantity, subtotal) VALUES (?, ?, ?, ?)");

// Loop through items
while ($row = $result->fetch_assoc()) {
    $sub_total = $row["quantity"] * $row["price"];
    $stmt->bind_param("iiid", $order_id, $row["item_id"], $row["quantity"], $sub_total);
    $stmt->execute();

    echo "<tr>";
    echo "<td><img src='" . htmlspecialchars($row["image_url"]) . "' alt='" . htmlspecialchars($row["merch_name"]) . "' style='width: 100px;'></td>";
    echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["quantity"]) . "</td>";
    echo "<td>€" . htmlspecialchars($row["price"]) . "</td>";
    echo "<td>€" . number_format($sub_total, 2) . "</td>";
    echo "</tr>";
}

$stmt->close();

echo "<tr>";
echo "<td colspan='4' style='text-align: right; font-weight: bold;'>Total Price</td>";
echo "<td>€" . number_format($total_price, 2) . "</td>";
echo "</tr>";
echo "</table>";

$sql_drop_table = "DROP TABLE IF EXISTS $shopping_cart_temp_table";

$conn ->query($sql_drop_table);
$conn->close();
?>
</body>
</html>