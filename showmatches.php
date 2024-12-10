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
    <header class="header">
        <nav class="nav-links">
            <a href="showplayers.php">Players</a>
            <a href="showmatches.php">Matches</a>
            <a href="awfcInventory.php">Merchandise</a>
        </nav>
        <div class="logo">
            <a href="mainpage.php"><img src="cannon.png" alt="Logo"></a>
        </div>
        <nav class="nav-links">
            <a href="createUser.php">Sign Up</a>
            <a href="userForm.php">Sign In</a>
        </nav>
    </header>
    <br>
    <h2>Match Information: </h2>
    <br>
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

        $sql_competition = "SELECT DISTINCT competition FROM matches ORDER BY competition ASC";
        $result_competition = $conn->query($sql_competition);

        if (!$result_season || !$result_opponents || !$result_competition) {
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

</html>
