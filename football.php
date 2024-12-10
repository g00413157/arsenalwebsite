<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styless.css" rel="stylesheet">
    <title>Player Information</title>
</head>
<body>

<?php
// Get the position and nationality from the query string
$position = isset($_GET['position']) ? $_GET['position'] : '';
$nationality = isset($_GET['nationality']) ? $_GET['nationality'] : '';

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the query to fetch the player details based on position and nationality
$sql = "SELECT * FROM players WHERE 1=1";
$params = [];
$types = "";

if (!empty($position)) {
    $sql .= " AND position = ?";
    $params[] = $position;
    $types .= "s";
}
if (!empty($nationality)) {
    $sql .= " AND nationality = ?";
    $params[] = $nationality;
    $types .= "s";
}
if (!empty($position) && $position !== "All") {
    $sql .= " AND position = ?";
    $params[] = $position;
    $types .= "s";
}
if (!empty($nationality) && $nationality !== "All") {
    $sql .= " AND nationality = ?";
    $params[] = $nationality;
    $types .= "s";
}

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if players are found
if ($result->num_rows > 0) {
    // Start the table and center it using the table-container div
    echo "<div class='table-container'>
            <table border='1' style='border-collapse: collapse; width: 100%; text-align: center;'>
                <thead>
                    <tr style='background-color: #f2f2f2;'>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Number</th>
                        <th>Nationality</th>
                        <th>Flag</th>
                        <th>Date of Birth</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>";

    // Output the player's details in a table row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='" . htmlspecialchars($row["profile_image"]) . "' alt='" . htmlspecialchars($row["name"]) . "' style='width:100px; height: auto; border-radius: 8px;' /></td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["position"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["number"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nationality"]) . "</td>";
        echo "<td><img src='" . htmlspecialchars($row["flag_image"]) . "' alt='" . htmlspecialchars($row["nationality"]) . " flag' style='width: 30px; height: auto;' /></td>";
        echo "<td>" . htmlspecialchars($row["date_of_birth"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
        echo "</tr>";
    }

    // End the table
    echo "</tbody></table></div>";
} else {
    echo "<div style='text-align: center; margin-top: 20px;'>No players found for the selected filters.</div>";
}

// Close the connection
$conn->close();
?>

</body>
</html>