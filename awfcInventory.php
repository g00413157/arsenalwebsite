<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-image: linear-gradient(to right, #a0f1eb, #ca94ff);
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header .nav-links {
            display: flex;
            gap: 20px;
        }

        .header a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .header a:hover {
            color: #007BFF;
        }

        .logo {
            position: center;
            align-items: center;

        }

        .logo img {
            height: 100px;
            /* Adjust logo size */

        }

        #buttons {
            color: #EF0107;
        }
    </style>

</head>

<body>
    <header class="header">
        <!-- Left navigation links -->
        <nav class="nav-links">
            <a href="showplayers.php">Players</a>
            <a href="showmatches.php">Matches</a>
            <a href="showmerchandise.php">Merchandise</a>
        </nav>

        <!-- Centered logo -->
        <div class="logo">
            <a href="mainpage.php">
                <img src="cannon.png" alt="Logo">
            </a>
        </div>

        <!-- Right navigation link -->
        <nav class="nav-links">
            <a href="createUser.php">Sign Up</a>
            <a href="userForm.php">Sign In</a>
        </nav>
    </header>

    <?php
    $conn = new mysqli("localhost", "root", "", "arsenalwebsitedb");
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $sql = "SELECT DISTINCT merch_name FROM merchandise ORDER BY merch_name ";
    $result = $conn->query($sql);
    $conn->close();
    ?>
    <center>Show Items</center>
    <div>
        <select name="status" id="status" onchange="updateAWFCStatus()">
            <option value="" disabled selected>Select a Status</option>
            <option value="">All</option>
            <option value="available">Available</option>
            <option value="out_of_stock">Out of Stock</option>
            <option value="limited_stock">Limited Edition</option>
        </select>
        <select name="merch_name" id="merch_name" onchange="updateAWFCStatus()">
            <option value="" disabled selected>Select a Name</option>
            <option value="">All</option>
            <?php while ($row = $result->fetch_assoc()) {
                echo "<option value=\"" . $row["merch_name"] . "\">" . $row["merch_name"] . "</option>";
            }
            ?>
        </select>
    </div>
    <div id="merch_response"></div>
    <script>
        function updateAWFCStatus() {
            var selectedValue1 = document.getElementById("status").value;
            var selectedValue2 = document.getElementById("merch_name").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "awfcshow.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("merch_response").innerHTML = this.responseText;
                }
            };
            xmlhttp.send("value1=" + selectedValue1 + "&value2=" + selectedValue2);
        }
    </script>
</body>

</html>