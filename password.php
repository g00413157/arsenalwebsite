<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get all users
$result = mysqli_query($conn, "SELECT id, password FROM users");
while ($row = mysqli_fetch_assoc($result)) {
    $hashedPassword = password_hash($row['password'], PASSWORD_DEFAULT);
    $updateQuery = "UPDATE users SET password = '$hashedPassword' WHERE id = " . $row['id'];
    mysqli_query($conn, $updateQuery);
}

echo "Passwords updated successfully!";
mysqli_close($conn);
?>
