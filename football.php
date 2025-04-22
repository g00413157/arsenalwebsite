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
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';


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
if (!empty($gender)) {
    $sql .= " AND gender = ?";
    $params[] = $gender;
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
if (!empty($gender) && $gender !== "All") {
    $sql .= " AND gender = ?";
    $params[] = $gender;
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

if ($result->num_rows > 0) {
    echo "<div class='card-container' style='display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;'>";

    while ($row = $result->fetch_assoc()) {
        echo "<div class='player-card' style='width: 280px; border: 1px solid #ddd; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center; background: #fff;'>";

        // Player Image
        echo "<div style='width: 100%; height: 250px; overflow: hidden;'>";
        echo "<img src='" . htmlspecialchars($row["profile_image"]) . "' alt='" . htmlspecialchars($row["name"]) . "' style='width: 100%; height: 100%; object-fit: cover;'>";
        echo "</div>";

        // Player Details
        echo "<div style='padding: 15px;'>";
        echo "<h2 style='margin: 10px 0; font-size: 20px;'>" . htmlspecialchars($row["name"]) . "</h2>";
        echo "<p><strong>Position:</strong> " . htmlspecialchars($row["position"]) . "</p>";
        echo "<p><strong>Number:</strong> " . htmlspecialchars($row["number"]) . "</p>";

        // Nationality with Flag
        echo "<p><strong>Nationality:</strong> ";
        echo "<img src='" . htmlspecialchars($row["flag_image"]) . "' alt='flag' style='width: 20px; height: 15px; margin-right: 5px; vertical-align: middle;'>";
        echo htmlspecialchars($row["nationality"]) . "</p>";

        echo "<p><strong>Team:</strong> " . htmlspecialchars($row["gender"]) . "</p>";
        echo "<p><strong>DOB:</strong> " . htmlspecialchars($row["date_of_birth"]) . "</p>";

        echo "<p style='margin-top: 10px; font-size: 14px; color: #555;'>" . htmlspecialchars($row["description"]) . "</p>";

        echo "</div>"; // end details
        echo "</div>"; // end player card
    }

    echo "</div>"; // end card container
} else {
    echo "<div style='text-align: center; margin-top: 20px;'>No players found for the selected filters.</div>";
}


// Close the connection
$conn->close();
?>

</body>
</html>