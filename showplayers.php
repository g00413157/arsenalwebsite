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
    <title>Player Information</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styless.css">
    <script>
        function showPlayer() {
            const position = document.getElementById("positions").value;
            const nationality = document.getElementById("nationalities").value;
            const gender = document.getElementById("gender").value;

            if (position === "" && nationality === "" && gender === "") {
                document.getElementById("footballertable").innerHTML = "Please select at least one filter.";
                return;
            } else {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("footballertable").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", `football.php?position=${position}&nationality=${nationality}&gender=${gender}`, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
<?php include 'header.php'; ?>

    <div id="backdrop" class="modal-backdrop" style="display:none;"></div>
    <div id="modal_front" class="modal" style="display:none;"></div>
    <br>
    <h1>Player Information</h1>
    <form>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "arsenalwebsitedb";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch distinct positions
        $sql_positions = "SELECT DISTINCT position FROM players ORDER BY position ASC";
        $result_positions = $conn->query($sql_positions);

        // Fetch distinct nationalities
        $sql_nationalities = "SELECT DISTINCT nationality FROM players ORDER BY nationality ASC";
        $result_nationalities = $conn->query($sql_nationalities);

        $sql_gender = "SELECT DISTINCT gender FROM players ORDER BY gender ASC";
        $result_gender = $conn->query($sql_gender);
        ?>

        <div>
            <label for="positions">Choose a position:</label>
            <select name="positions" id="positions" onchange="showPlayer()">
                <option value="">All Positions</option> <!-- Added "All Positions" -->
                <?php
                while ($row = $result_positions->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row["position"]) . "\">" . htmlspecialchars($row["position"]) . "</option>";
                }
                ?>
            </select>

            <label for="nationalities">Choose a nationality:</label>
            <select name="nationalities" id="nationalities" onchange="showPlayer()">
                <option value="">All Nationalities</option> <!-- Added "All Nationalities" -->
                <?php
                while ($row = $result_nationalities->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row["nationality"]) . "\">" . htmlspecialchars($row["nationality"]) . "</option>";
                }
                ?>
            </select>
            <label for="gender">Choose a Team:</label>
            <select name="gender" id="gender" onchange="showPlayer()">
                <option value="">All Teams</option> <!-- Added "All Teams" -->
                <?php
                while ($row = $result_gender->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row["gender"]) . "\">" . htmlspecialchars($row["gender"]) . "</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <br>
    <div id="footballertable"><b>Player info will be listed here...</b></div>

    <?php
    $conn->close();
    ?>

</body>
<script src="js/logincreate.js"></script>

</html>