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

// SQL to create the matches table
$sql = "CREATE TABLE matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    opponent VARCHAR(100) NOT NULL,
    stadium VARCHAR(100) NOT NULL,
    home_away ENUM('Home','Away') NOT NULL,
    score VARCHAR(20) NOT NULL,
    competition VARCHAR(100) NOT NULL,
    season VARCHAR(20) NOT NULL
);"; // Removed the trailing comma here

if ($conn->query($sql) === TRUE) {
    echo "Table Matches created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>
