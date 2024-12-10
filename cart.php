
    <?php
session_start();
$item = isset($_POST["item"]) ? $_POST["item"] : "";
$user_id = isset($_SESSION['username']) ? intval($_SESSION['username']) : 0; // Default to 0 if not logged in
$remove_item = isset($_POST["remove_item"]) ? $_POST["remove_item"] : "";

$conn = new mysqli("localhost", "root", "", "arsenalwebsitedb");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
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
    .cart-btn,#checkout-btn {
        padding: 8px 15px;
        margin-top: 5px;
        background-color: #ca94ff;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    .cart-btn:hover,#checkout-btn:hover{
        background-color: #9f76c4;
    }
    p {
        text-align: center;
        font-size: 18px;
    }
</style>";

$shopping_cart_temp_table = "shopping_cart_user_$user_id";
$sql_table_statement = "SHOW TABLES LIKE '$shopping_cart_temp_table'";
$result = $conn->query($sql_table_statement);

if (mysqli_num_rows($result) == 0) { // Corrected condition
    $sql_create_table = "CREATE TABLE $shopping_cart_temp_table (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        item_id INT NOT NULL,
        quantity INT NOT NULL
    )";
    $conn->query($sql_create_table);
}

if ($item) {
    $sql_find_item_in_cart = "SELECT item_id, quantity FROM $shopping_cart_temp_table WHERE item_id = $item";
    $result_find = $conn->query($sql_find_item_in_cart);

    if (mysqli_num_rows($result_find) == 0) {
        $stmt = $conn->prepare("INSERT INTO $shopping_cart_temp_table (item_id, quantity) VALUES (?, ?)");
        $quantity_now = 1;
        $stmt->bind_param("ii", $item, $quantity_now);
        $stmt->execute();
        $stmt->close();
    } else {
        $row = mysqli_fetch_array($result_find);
        $value = $row["quantity"] + 1;
        $stmt = $conn->prepare("UPDATE $shopping_cart_temp_table SET quantity = ? WHERE item_id = ?");
        $stmt->bind_param("ii", $value, $item);
        $stmt->execute();
        $stmt->close();
    }
}

if ($remove_item) {
    $stmt = $conn->prepare("DELETE FROM $shopping_cart_temp_table WHERE item_id = ?");
    $stmt->bind_param("i", $remove_item);
    $stmt->execute();
    $stmt->close();
}

$sql_items = "SELECT item_id FROM $shopping_cart_temp_table ORDER BY item_id";
$items_result = $conn->query($sql_items);

if ($items_result->num_rows > 0) {
    $sql_statement = "SELECT m.merch_name, m.price, m.image_url, m.description, t.quantity, t.item_id
        FROM $shopping_cart_temp_table t
        JOIN Merchandise m ON t.item_id = m.item_id";
    $result = $conn->query($sql_statement);
    $conn->close();

    echo "<br><h1><b>SHOPPING CART</b></h1><br>";
    echo "<table id='table-container' style='width: 90%'>";
    echo "<tr>
        <th>Image</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th></th>
    </tr>";
    $total_price = 0;

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><img src='" . htmlspecialchars($row["image_url"]) . "' alt='" . htmlspecialchars($row["merch_name"]) . "'></td>";
        echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>€" . htmlspecialchars($row["price"]) . "</td>";
        echo "<td><button class='cart-btn' onclick='removeFromCart(" . $row['item_id'] . ")'>Remove From Cart</button></td>";
        echo "</tr>";
        $total_price += $row['price'] * $row['quantity'];
    }
    echo "<td></td><td></td><td><b>Total Price:</b></td><td>€$total_price</td><td></td>";
    echo "<tr><td></td><td></td><td></td><td></td>";
    echo "<td><button id='checkout-btn' onclick='checkoutItems(\"$shopping_cart_temp_table\", \"$user_id\", $total_price)'>Checkout</button></td></tr>";
    echo "</table>";
} else {
    echo "Your shopping cart is empty.";
}
?>

