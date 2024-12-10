<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 $servername="localhost";
 $username = "root";
 $password = "";
 $db_name = "arsenalwebsitedb";
 //Create Connection
 $conn = mysqli_connect($servername,$username,$password,$db_name);

 $sql="CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    profile_image  VARCHAR(20),
    name VARCHAR(255) NOT NULL,
    number INT NOT NULL,
    position VARCHAR(100) NOT NULL,
    nationality VARCHAR(100) NOT NULL,
    flag_image VARCHAR(20),
    date_of_birth DATE NOT NULL,
    date_joined DATE NOT NULL,
    description TEXT
);"; 

if ($conn->query($sql) === TRUE) {
    echo "Table Players created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  
  $conn->close();
 ?>
 </body>
 </html>