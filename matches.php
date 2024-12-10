<?php
// Retrieve filter values from GET request
$season = isset($_GET['season']) ? $_GET['season'] : '';
$opponent = isset($_GET['opponent']) ? $_GET['opponent'] : '';
$competition = isset($_GET['competition']) ? $_GET['competition'] : '';

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";

// Establish connection
$conn = mysqli_connect($servername, $username, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Base query
$sql = "SELECT * FROM matches WHERE 1=1";
$params = [];
$types = "";

// Append conditions dynamically
if (!empty($season)) {
    $sql .= " AND season = ?";
    $params[] = $season;
    $types .= "s";
}
if (!empty($opponent)) {
    $sql .= " AND opponent = ?";
    $params[] = $opponent;
    $types .= "s";
}
if (!empty($competition)) {
    $sql .= " AND competition = ?";
    $params[] = $competition;
    $types .= "s";
}

// Prepare the query
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters if any filters are applied
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check results
if ($result->num_rows > 0) {
    echo "<div class='table-container'>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Season</th>
                        <th>Arsenal Team</th>
                        <th></th>
                        <th>Opponent</th>
                        <th>Stadium</th>
                        <th>Home/Away</th>
                        <th>Score</th>
                        <th>Competition</th>
                    </tr>
                </thead>
                <tbody>";
    
    // Loop through the rows to populate the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["date"]) . "</td>
                <td>" . htmlspecialchars($row["season"]) . "</td>
                <td>
                    <img src='" . htmlspecialchars($row["arsenalb_url"]) . "' 
                         alt='" . htmlspecialchars($row["arsenal"]) . "' 
                         style='width: 50px; height: auto;'>
                </td>
                <td>VS</td>
                <td>
                    <img src='" . htmlspecialchars($row["badge_url"]) . "' 
                         alt='" . htmlspecialchars($row["opponent"]) . "' 
                         style='width: 50px; height: auto;'>
                </td>
                <td>" . htmlspecialchars($row["stadium"]) . "</td>
                <td>" . htmlspecialchars($row["home_away"]) . "</td>
                <td><b>" . htmlspecialchars($row["score"]) . "</b></td>
                <td>
                    <img src='" . htmlspecialchars($row["comp_url"]) . "' 
                         alt='" . htmlspecialchars($row["competition"]) . "' 
                         style='width: 50px; height: auto;'>
                </td>
              </tr>";
    }

    echo "</tbody></table></div>";
} else {
    // No results message
    echo "<div style='text-align: center; margin-top: 20px;'>No matches found for the selected filters.</div>";
}

// Close the connection
$conn->close();
?>
