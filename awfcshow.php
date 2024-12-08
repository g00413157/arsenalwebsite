<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise Table</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            align-content: center;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        img {
            max-width: 100px; /* Adjust to fit the table */
            height: auto;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "arsenalwebsitedb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch merchandise data
    $sql = "SELECT merch_name, description, price, status, image_url FROM merchandise";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>Image</th>
                <th>Merchandise Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                
              </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='" . htmlspecialchars($row['image_url']) . "' alt='" . htmlspecialchars($row['merch_name']) . "'></td>";
            echo "<td>" . htmlspecialchars($row['merch_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
            echo "<td>$" . htmlspecialchars($row['price']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No merchandise available.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
