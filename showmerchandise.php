<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchandise Information</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arsenal+SC:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <script>
        function showMerchandise(str) {
            if (str === "") {
                document.getElementById("footballertable").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("merchandisetable").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "awfcinventory.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <form>
        <?php
        $servername = "localhost"; // Use "arsenalwebsite" if hosted externally
        $username = "root";
        $password = "";
        $db_name = "arsenalwebsitedb";

        // Create Connection
        $conn = mysqli_connect($servername, $username, $password, $db_name);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch distinct positions and sort them alphabetically
        $sql = "SELECT DISTINCT merch_name FROM merchandise ORDER BY merch_name ASC";
        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        ?>

        <div>
            <label for="merchandise">Choose an item:</label>
            <select name="name" id="merchandise" onchange="showMerchandise(this.value)">
                <option value="" style="display:none">Select a position</option>
                <?php
                // Populate the dropdown with positions
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row["merch_name"]) . "\">" . htmlspecialchars($row["merch_name"]) . "</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <br>
    <div id="merchandisetable"><b> Choose your Merchandise</b></div>

    <?php
    // Close the connection
    $conn->close();
    ?>
</body>

</html>
