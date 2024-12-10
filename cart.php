<?php
$item = isset($_POST["item"]) ? $_POST["item"] : "";
$user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : "";
$remove_item = isset($_POST["remove_item"]) ? $_POST["remove_item"] : "";

$conn = new mysqli("localhost", "root", "", "arsenalwebsitedb");

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$shopping_cart_temp_table = "shopping_cart_user_$user_id";
$sql_table_statement = "SHOW TABLES LIKE '$shopping_cart_temp_table'";
$result = $conn->query($sql_table_statement);

if (mysqli_num_rows($result) > 0) {
    $sql_create_table = "CREATE TABLE $shopping_cart_temp_table(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    item_id INT NOT NULL,
    quantity INT NOT NULL
    )";

    $conn->query($sql_create_table);
}
if ($item) {
    $sql_find_item_in_cart = "SELECT item_id,quantity FROM $shopping_cart_temp_table WHERE item_id=$item";
    $result_find = $conn->query($sql_find_item_in_cart);

    if (mysqli_num_rows($result_find) == 0) {

        $stmt = $conn->prepare("INSERT INTO $shopping_cart_temp_table(item_id, quantity) VALUES(?,?)");
        $quantity_now = 1;
        $stmt->bind_param("dd", $item, $quantity_noe);

        $stmt->execute();
        $stmt->close();
    } else {
        $row = mysqli_fetch_array($result_find);
        $value = $row["quantity"];

        $stmt = $conn->prepare("UPDATE $shopping_cart_temp_table SET quantity = ? WHERE item_id=?");
        $stmt->bind_param("dd", $value, $item);
        $stmt->execute();
        $stmt->close();
    }
}
if ($remove_item) {
    $stmt = $conn->prepare("DELETE FROM $shopping_cart_temp_table WHERE item_id = ?");
    $stmt->bind_param("d", $remove_item);
    $stmt->execute();
    $stmt->close();
}

$sql_items = "SELECT item_id,quantity FROM $shopping_cart_temp_table ORDER BY item_id";
$items_result = $conn->query($sql_items);

if ($items_result->num_rows > 0) {
    $sql_statement = "SELECT m.merch_name,m.price,t.quantity, t.item.id 
    FROM $shopping_cart_temp_table t 
    JOIN Merchandise m ON t.item_id = m.item_id";

    $result = $conn->query($sql_statement);
    $conn->close();

    echo "<br><b>SHOPPING CART</b>";
    echo "<table id='table-container style=\"width: 90%\">";
    echo "<tr>
    <th></th>
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
        echo " <td>" . htmlspecialchars($row["description"]) . "</td>";
        echo "<td>" . $row['size'] . "</td>";
        echo "<td>€" . htmlspecialchars($row["price"]) . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td><button onclick='removeFromCart(" . $row['sock_id'] . ")'>Remove From Cart</button></td>";
        echo "</tr>";
        $total_price = $total_price + $row['price'] * $row['quantity'];
        echo "<tr> <td>Total</td> <td> </td> <td> </td> <td> </td> <td>&euro;$total_price </td>";
echo "<td><button onclick='checkoutItems(\"" . $shopping_cart_temp_table . "\", \"" . $user_id . "\", $total_price)'>Checkout</button></td></tr>";
echo "</table>";
    }

}
