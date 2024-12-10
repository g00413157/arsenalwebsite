<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "arsenalwebsitedb");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check if request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Match the entered password directly (no hashing)
        if ($password === $row['password']) {
            $_SESSION['username'] = $row['username'];
            echo "Login successful! Welcome,: " . $row['username'];
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
