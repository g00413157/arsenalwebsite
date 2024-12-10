<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches</title>
</head>
<body>
<?php
$servername = "localhost"; // Correct hostname for local database
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL to create the orders table
$sql = "CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,                       
    item_id INT NOT NULL,                    
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)"; // Removed the trailing comma here

if ($conn->query($sql) === TRUE) {
    echo "Table Orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>
