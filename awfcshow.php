<?php
session_start();
$merch_name = isset($_POST['merch_name']) ? htmlspecialchars($_POST['merch_name']) : '';
$status_out = isset($_POST['status']) ? $_POST['status'] : [];

$status_clause = '';
$name_clause = '';
$extra = ' WHERE';

if (!empty($status_out)) {
    $status = implode("','", array_map('htmlspecialchars', $status_out));
    $status_clause = "$extra status IN ('$status')";
    $extra = ' AND';
}

if ($merch_name) {
    $name_clause = "$extra merch_name = '$merch_name'";
}

// SQL query to fetch merchandise
$sql_statement = "SELECT * FROM merchandise $status_clause $name_clause";

$conn = new mysqli("localhost", "root", "", "arsenalwebsitedb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql_statement);
if (!$result) {
    die("Query error: " . $conn->error);
}

// CSS for styling the table
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

if ($result->num_rows > 0) {
    echo "<table id='table-container'>
          <tr>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='{$row['image_url']}' alt='Merchandise Image'></td>
                <td>{$row['description']}</td>
                <td>€{$row['price']}</td>
                <td>{$row['status']}</td>
                <td>
                    <form action='cart.php' method='POST'>
                        <input type='hidden' name='item' value='{$row['item_id']}'>
                        <input type='hidden' name='price' value='{$row['price']}'>
                        <input type='hidden' name='merch_name' value='{$row['merch_name']}'>
                        <input type='hidden' name='status' value='{$row['status']}'>
                        <button type='submit' class='cart-btn'>Add to Cart</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No merchandise available.</p>";
}

$conn->close();
?>
