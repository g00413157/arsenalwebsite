<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

// SQL to create the matches table
$sql = "CREATE TABLE merchandise (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    merch_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    status VARCHAR(100) NOT NULL,
    image_url VARCHAR(20) NOT NULL,
    created_at TIMESTAMP NOT NULL
    
);"; // Removed the trailing comma here

if ($conn->query($sql) === TRUE) {
    echo "Table Merchandise created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>
