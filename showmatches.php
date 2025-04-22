<?php
session_start();

// Check if cart_items session exists and has data
$cart_count = 0;
if (isset($_SESSION['cart_items'])) {
    foreach ($_SESSION['cart_items'] as $item_id => $item_info) {
        $cart_count += $item_info['quantity'];  // Sum up the quantities
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
            const competition = document.getElementById("competition").value; // Fixed to retrieve value
            const team = document.getElementById("team").value; // Fixed to retrieve value
            const query = `season=${encodeURIComponent(season)}&opponent=${encodeURIComponent(opponent)}&competition=${encodeURIComponent(competition)}`;
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
    <br>
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

        // Fetch distinct options for filters
        $sql_season = "SELECT DISTINCT season FROM matches ORDER BY season ASC";
        $result_season = $conn->query($sql_season);

        $sql_opponent = "SELECT DISTINCT opponent FROM matches ORDER BY opponent ASC";
        $result_opponents = $conn->query($sql_opponent);

        $sql_team = "SELECT DISTINCT arsenal FROM matches ORDER BY arsenal ASC";
        $result_team= $conn->query($sql_team);

        $sql_competition = "SELECT DISTINCT competition FROM matches ORDER BY competition ASC";
        $result_competition = $conn->query($sql_competition);
      

        if (!$result_season ||!$result_team || !$result_opponents || !$result_competition) {
            die("Query failed: " . $conn->error);
        }
        ?>

        <div>
            <label for="season"><b>Choose a season:</b></label>
            <select name="season" id="season" onchange="showMatches()">
                <option value="" style="display:none">Select a season</option>
                <option value="">All Seasons</option>
                <?php
                while ($row = $result_season->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row["season"]) . "\">" . htmlspecialchars($row["season"]) . "</option>";
                }
                ?>
            </select>
            <br>
            <label for="team"><b>Choose an Arsenal Team:</b></label>
            <select name="team" id="team" onchange="showMatches()">
                <option value="">All Arsenal Teams</option>
                <?php
                while ($row = $result_team->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row["arsenal"]) . "\">" . htmlspecialchars($row["arsenal"]) . "</option>";
                }
                ?>
            </select>
            <br>

            <label for="opponent"><b>Choose an opponent:</b></label>
            <select name="opponents" id="opponents" onchange="showMatches()">
                <option value="">All Opponents</option>
                <?php
                while ($row = $result_opponents->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row["opponent"]) . "\">" . htmlspecialchars($row["opponent"]) . "</option>";
                }
                ?>
            </select>
            <br>

            <label for="competition"><b>Choose a competition:</b></label>
            <select name="competition" id="competition" onchange="showMatches()">
                <option value="">All Competitions</option>
                <?php
                while ($row = $result_competition->fetch_assoc()) { // Fixed the result source
                    echo "<option value=\"" . htmlspecialchars($row["competition"]) . "\">" . htmlspecialchars($row["competition"]) . "</option>";
                }
                ?>
            </select>
            
        </div>
    </form>

    <br>
    <div id="matchestable"><b>Match info will be listed here...</b></div>
    <br>
    <?php
    $conn->close();
    ?>
</body>
<script src="js/logincreate.js"></script>
</html>
