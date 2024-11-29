<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <title>Loaded Content</title>
</head>

<body>
    <?php
    $status = $_POST['value1'];
    $merch_name = $_POST['value2'];

    $conn = new mysqli('localhost', 'root', '', 'arsenalwebsitedb');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }
    if ($status && $merch_name) {
        $sql = "SELECT * FROM merchandise WHERE status= '$status' AND merch_name= '$merch_name' ";
    } else if ($status) {
        $sql = "SELECT * FROM merchandise WHERE status= '$status'";
    } else if ($merch_name) {
        $sql = "SELECT * FROM merchandise WHERE merch_name= '$merch_name'";
    } else {
        $sql = "SELECT * FROM merchandise";
    }
    $result = $conn->query($sql);
    echo "<table style=\"width:60%\">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        
                    
                    </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>". $row["image_url"] ."</td>";
                        echo "<td>". $row["merch_name"] ."</td>";
                        echo "<td>". $row["description"] ."</td>";
                        echo "<td>". $row["price"] ."</td>";
                        echo "<td>". $row["status"] ."</td>";
                    }


    ?>
</body>

</html>