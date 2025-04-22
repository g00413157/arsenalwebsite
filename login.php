<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
        exit();
    }

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $dbUsername, $dbPassword);
        $stmt->fetch();

        // Use password_verify() for security
        if (password_verify($password, $dbPassword)) {
            $_SESSION['username'] = $dbUsername;
            $_SESSION['user_id'] = $id;

            header("Location: indexAfter.php"); // Redirect to the main page
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
    $conn->close();
}


?>