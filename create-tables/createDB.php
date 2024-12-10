<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Create Database</title>
</head>
<body>
    <?php
    $servername="localhost";
    $username= "root";
    $password= "";

    //create Connection
    $conn = new mysqli($servername, $username, $password);
    //Check Connection 
    if ($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    }

// Create Database
$sql = "CREATE DATABASE arsenalwebsiteDB";
if ($conn->query($sql) === TRUE) {
    echo "Database Created Successfully";
} else {
    echo "Error creating Database". $conn->error;
}

$conn->close(); 


    ?>
</body>
</html>