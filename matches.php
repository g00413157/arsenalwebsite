<?php
$season = isset($_GET['season']) ? $_GET['season'] : '';
$opponent = isset($_GET['opponent']) ? $_GET['opponent'] : '';
$competition = isset($_GET['competition']) ? $_GET['competition'] : '';
$team = isset($_GET['arsenal']) ? $_GET['arsenal'] : ''; // Correct key

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";

$conn = mysqli_connect($servername, $username, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM matches WHERE 1=1";
$params = [];
$types = "";

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
if (!empty($team)) {
    $sql .= " AND arsenal = ?";
    $params[] = $team;
    $types .= "s";
}

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='match-card-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='match-card'>
            <h2>" . htmlspecialchars($row["arsenal"]) . " vs " . htmlspecialchars($row["opponent"]) . "</h2>
            <div class='logos'>
                <img src='" . htmlspecialchars($row["arsenalb_url"]) . "' alt='" . htmlspecialchars($row["arsenal"]) . "' width='35' height='40'>
                <span>VS</span>
                <img src='" . htmlspecialchars($row["badge_url"]) . "' alt='" . htmlspecialchars($row["opponent"]) . "' width='35' height='40'>
            </div>
            <p><strong>Date:</strong> " . htmlspecialchars($row["date"]) . "</p>
            <p><strong>Season:</strong> " . htmlspecialchars($row["season"]) . "</p>
            <p><strong>Stadium:</strong> " . htmlspecialchars($row["stadium"]) . "</p>
            <p><strong>Home/Away:</strong> " . htmlspecialchars($row["home_away"]) . "</p>
            <p><strong>Score:</strong> <b>" . htmlspecialchars($row["score"]) . "</b></p>
            <div class='competition'>
                <img src='" . htmlspecialchars($row["comp_url"]) . "' alt='" . htmlspecialchars($row["competition"]) . "'>
                <p>" . htmlspecialchars($row["competition"]) . "</p>
            </div>
        </div>";
    }
    echo "</div>";
} else {
    echo "<div style='text-align: center; margin-top: 20px;'>No matches found for the selected filters.</div>";
}

$conn->close();
?>
