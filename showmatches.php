<?php
session_start();
$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item_id => $item_info) {
        $cart_count += $item_info['quantity'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="crest.png">
    <title>Match Information</title>
    <link rel="stylesheet" href="styless.css">
    <script>
        function showMatches() {
            const season = document.getElementById("season").value;
            const opponent = document.getElementById("opponents").value;
            const competition = document.getElementById("competition").value;
            const team = document.getElementById("arsenal").value; // Updated ID

            const query = `season=${encodeURIComponent(season)}&opponent=${encodeURIComponent(opponent)}&competition=${encodeURIComponent(competition)}&arsenal=${encodeURIComponent(team)}`;

            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("matchestable").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "matches.php?" + query, true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
<?php include 'header.php'; ?>
<div id="backdrop" class="modal-backdrop" style="display:none;"></div>
<div id="modal_front" class="modal" style="display:none;"></div>

<h1>Match Information: </h1>

<form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "arsenalwebsitedb";
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql_season = "SELECT DISTINCT season FROM matches ORDER BY season ASC";
    $sql_opponent = "SELECT DISTINCT opponent FROM matches ORDER BY opponent ASC";
    $sql_team = "SELECT DISTINCT arsenal FROM matches ORDER BY arsenal ASC";
    $sql_competition = "SELECT DISTINCT competition FROM matches ORDER BY competition ASC";

    $result_season = $conn->query($sql_season);
    $result_opponents = $conn->query($sql_opponent);
    $result_team = $conn->query($sql_team);
    $result_competition = $conn->query($sql_competition);

    if (!$result_season || !$result_team || !$result_opponents || !$result_competition) {
        die("Query failed: " . $conn->error);
    }
    ?>

    <div>
        <label for="season"><b>Choose a season:</b></label>
        <select name="season" id="season" onchange="showMatches()">
            <option value="" style="display:none">Select a season</option>
            <option value="">All Seasons</option>
            <?php while ($row = $result_season->fetch_assoc()) {
                echo "<option value=\"" . htmlspecialchars($row["season"]) . "\">" . htmlspecialchars($row["season"]) . "</option>";
            } ?>
        </select>
        <br>

        <label for="arsenal"><b>Choose an Arsenal Team:</b></label>
        <select name="arsenal" id="arsenal" onchange="showMatches()"> <!-- ID and name now match the backend key -->
            <option value="">All Arsenal Teams</option>
            <?php while ($row = $result_team->fetch_assoc()) {
                echo "<option value=\"" . htmlspecialchars($row["arsenal"]) . "\">" . htmlspecialchars($row["arsenal"]) . "</option>";
            } ?>
        </select>
        <br>

        <label for="opponents"><b>Choose an opponent:</b></label>
        <select name="opponents" id="opponents" onchange="showMatches()">
            <option value="">All Opponents</option>
            <?php 
            $opponentsArray = []; // Create an array to store unique opponents
            while ($row = $result_opponents->fetch_assoc()) {
                $opponentName = htmlspecialchars($row["opponent"]);
                if (!in_array($opponentName, $opponentsArray)) { // Check if opponent is already in the array
                    $opponentsArray[] = $opponentName; // Add opponent to array
                    echo "<option value=\"$opponentName\">$opponentName</option>";
                }
            }
            ?>
        </select>
        <br>

        <label for="competition"><b>Choose a competition:</b></label>
        <select name="competition" id="competition" onchange="showMatches()">
            <option value="">All Competitions</option>
            <?php while ($row = $result_competition->fetch_assoc()) {
                echo "<option value=\"" . htmlspecialchars($row["competition"]) . "\">" . htmlspecialchars($row["competition"]) . "</option>";
            } ?>
        </select>
    </div>
</form>

<div id="matchestable"><b>Match info will be listed here...</b></div>

<?php $conn->close(); ?>
<script src="js/logincreate.js"></script>
</body>
</html>
