<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get filter parameters from GET request
$season = isset($_GET['season']) ? $_GET['season'] : '';
$opponent = isset($_GET['opponent']) ? $_GET['opponent'] : '';
$competition = isset($_GET['competition']) ? $_GET['competition'] : '';
$team = isset($_GET['team']) ? $_GET['team'] : '';

// Start the base query
$sql = "SELECT * FROM matches WHERE 1";

// Add conditions to the query if filters are applied
if ($season) {
    $sql .= " AND season = '" . mysqli_real_escape_string($conn, $season) . "'";
}
if ($opponent) {
    $sql .= " AND opponent = '" . mysqli_real_escape_string($conn, $opponent) . "'";
}
if ($competition) {
    $sql .= " AND competition = '" . mysqli_real_escape_string($conn, $competition) . "'";
}
// Add filter for team (Arsenal Men or Arsenal Women)
if ($team) {
    $sql .= " AND arsenal = '" . mysqli_real_escape_string($conn, $team) . "'";
}

// Run the query
$result = $conn->query($sql);

// Fetch distinct values for filters (seasons, competitions, etc.)
$sql_season = "SELECT DISTINCT season FROM matches ORDER BY season ASC";
$result_season = $conn->query($sql_season);

$sql_competition = "SELECT DISTINCT competition FROM matches ORDER BY competition ASC";
$result_competition = $conn->query($sql_competition);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="crest.png">
    <title>Match Information</title>
    <link rel="stylesheet" href="styless.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <div id="backdrop" class="modal-backdrop" style="display:none;"></div>
    <div id="modal_front" class="modal" style="display:none;"></div>
    <br>
    <h1>Match Information: </h1>

    <!-- Form to Filter Matches -->
    <form method="GET" action="matches.php">
        <div>
            <label for="season"><b>Choose a season:</b></label>
            <select name="season" id="season" onchange="this.form.submit()">
                <option value="">All Seasons</option>
                <?php
                while ($row = $result_season->fetch_assoc()) {
                    $selected = (isset($_GET['season']) && $_GET['season'] == $row["season"]) ? 'selected' : '';
                    echo "<option value=\"" . htmlspecialchars($row["season"]) . "\" $selected>" . htmlspecialchars($row["season"]) . "</option>";
                }
                ?>
            </select>
            <br>

            <!-- Filter for Arsenal Team: "Arsenal Men" or "Arsenal Women" -->
            <label for="team"><b>Choose a Team:</b></label>
            <select name="team" id="team" onchange="this.form.submit()">
                <option value="">Select a Team</option>
                <option value="Arsenal Men" <?php echo (isset($_GET['team']) && $_GET['team'] == 'Arsenal Men') ? 'selected' : ''; ?>>Arsenal Men</option>
                <option value="Arsenal Women" <?php echo (isset($_GET['team']) && $_GET['team'] == 'Arsenal Women') ? 'selected' : ''; ?>>Arsenal Women</option>
            </select>
            <br>

            <!-- Opponent Filter: Dynamically populated based on the selected team -->
            <label for="opponent"><b>Choose an opponent:</b></label>
            <select name="opponent" id="opponent" onchange="this.form.submit()">
                <option value="">All Opponents</option>
                <?php
                // Show opponents based on the selected team
                if (isset($_GET['team'])) {
                    // Fetch only the opponents related to the selected team
                    $sql_opponent = "SELECT DISTINCT opponent FROM matches WHERE arsenal = '" . mysqli_real_escape_string($conn, $_GET['team']) . "' ORDER BY opponent ASC";
                    $result_opponent = $conn->query($sql_opponent);
                    
                    while ($row = $result_opponent->fetch_assoc()) {
                        $selected = (isset($_GET['opponent']) && $_GET['opponent'] == $row["opponent"]) ? 'selected' : '';
                        echo "<option value=\"" . htmlspecialchars($row["opponent"]) . "\" $selected>" . htmlspecialchars($row["opponent"]) . "</option>";
                    }
                }
                ?>
            </select>
            <br>

            <!-- Filter for Competition -->
            <label for="competition"><b>Choose a competition:</b></label>
            <select name="competition" id="competition" onchange="this.form.submit()">
                <option value="">All Competitions</option>
                <?php
                while ($row = $result_competition->fetch_assoc()) {
                    $selected = (isset($_GET['competition']) && $_GET['competition'] == $row["competition"]) ? 'selected' : '';
                    echo "<option value=\"" . htmlspecialchars($row["competition"]) . "\" $selected>" . htmlspecialchars($row["competition"]) . "</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <br>

    <!-- Display Matches -->
    <?php
    if ($result->num_rows > 0) {
        echo "<h2>Match Information</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Season</th><th>Team</th><th>Opponent</th><th>Competition</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row['season']) . "</td><td>" . htmlspecialchars($row['arsenal']) . "</td><td>" . htmlspecialchars($row['opponent']) . "</td><td>" . htmlspecialchars($row['competition']) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No matches found based on the selected filters.</p>";
    }

    $conn->close();
    ?>

</body>
</html>
