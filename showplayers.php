<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Information</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arsenal+SC:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function showPlayer(str) {
            if (str === "") {
                document.getElementById("footballertable").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById("footballertable").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "football.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
     <style>
        .navbar-brand img {
            height: 60px; /* Adjust the logo size as needed */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Left links -->
            <div class="d-flex">
                <a class="nav-link px-3" href="mainpage.php">Home</a>
                <a class="nav-link px-3" href="showplayers.php">Players</a>
                <a class="nav-link px-3" href="showmatches.php">Matches</a>
                <a class="nav-link px-3" href="showmerchandise.php">Merchandise</a>
            </div>

            <!-- Centered logo -->
            <a class="navbar-brand mx-auto" href="index.html">
                <img src="cannon.png" alt="Logo">
            </a>

            <!-- Right link -->
            <div class="d-flex">
                <a class="nav-link px-3" href="showmerchandise.php">Merchandise</a>
            </div>
        </div>
    </nav>
    <br>
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
        $sql = "SELECT DISTINCT position FROM players ORDER BY position ASC";
        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        ?>

        <div>
            <label for="players">Choose a position:</label>
            <select name="positions" id="players" onchange="showPlayer(this.value)">
                <option value="" style="display:none">Select a position</option>
                <?php
                // Populate the dropdown with positions
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"" . htmlspecialchars($row["position"]) . "\">" . htmlspecialchars($row["position"]) . "</option>";
                }
                ?>
            </select>
        </div>
    </form>

    <br>
    <div id="footballertable"><b>Player info will be listed here...</b></div>

    <?php
    // Close the connection
    $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>