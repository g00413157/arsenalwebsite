<?php
$shopping_cart_temp_table=isset($_POST["shopping_cart"]) ? $_POST["shopping_cart"] :"";
$user_id=isset($_POST["user_id"]) ? $_POST["user_id"] :"";
$total_price=isset($_POST["total_price"]) ? $_POST["total_price"] :"";

$conn=new mysqli("localhost","root","","arsenalwebsitedb");

if($conn->connect_error){
    die("Connection Failed". $conn->connect_error);
}

$sql_items= "SELECT item_id,quantity from $shopping_cart_temp_table ORDER BY item_id";
$items_result= $conn->query($sql_items);

$stmt = $conn->prepare("INSERT INTO Orders (user_id, total_amount) VALUES (?,?)");
$stmt->bind_param("dd", $user_id,$total_price);

if($stmt->execute()){
    $order_id=$conn->insert_id;
}else{
    echo "Error: ".$stmt->error;
}

$stmt->close();

$sql_statement = "SELECT m.merch_name,m.price,t.quantity, t.item.id 
    FROM $shopping_cart_temp_table t 
    JOIN Merchandise m ON t.item_id = m.item_id";

    $result = $conn->query($sql_statement);
   

    echo "<br><b>ORDER HAS BEEN MADE</b>";
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







?>