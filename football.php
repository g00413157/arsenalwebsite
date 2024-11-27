<style>
    th {
        background-color: #EF0107;
        color: #ffffff;
        font-family: "Arsenal SC", sans-serif;
        font-weight: 400;
        font-style: normal;

    }

    tr {
        border-bottom: 1px solid #ddd;
        font-family: "Arsenal SC", sans-serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;

    }
  table,tr{
    width: 100%;
  }
    table,
    th,
    td {
        border: 1px solid ;
        width: 12%;
        padding: 8px;
       
    }

    .profile-image {
        width: 50px;
        height: auto;
        border-radius: 8px;
    }

    .flag-image {
        width: 30px;
        height: auto;
    }
</style>

<?php
// Get the position from the query string
if (isset($_GET['q'])) {
    $position = $_GET['q'];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "arsenalwebsitedb";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the query to fetch the player details based on position
    $sql = "SELECT * FROM players WHERE position = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $position); // "s" means string

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if players are found
    if ($result->num_rows > 0) {
        // Start the table
        echo "<table >
                <thead>
                    <tr>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Number</th>
                        <th>Nationality</th>
                        <th>Flag</th>
                        <th>Date of Birth</th>
                        <th>Description</th>
                    
                    </tr>
                </thead>
                <tbody>";

        // Output the player's details in a table row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";

            // Display profile image in the first column
            echo "<td><img src='" . htmlspecialchars($row["profile_image"]) . "' alt='" . htmlspecialchars($row["name"]) . "' class='profile-image' /></td>";

            // Display player name
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";

            // Display position
            echo "<td>" . htmlspecialchars($row["position"]) . "</td>";

            echo "<td>" . htmlspecialchars($row["number"]) . "</td>";

            // Display nationality
            echo "<td>" . htmlspecialchars($row["nationality"]) . "</td>";

            echo "<td><img src='" . htmlspecialchars($row["flag_image"]) . "' alt='" . htmlspecialchars($row["nationality"]) . " flag' class='flag-image' /></td>";
            // Display date of birth
            echo "<td>" . htmlspecialchars($row["date_of_birth"]) . "</td>";

            // Display description
            echo "<td >" . htmlspecialchars($row["description"]) . "</td>";

            // Display flag image in the last column


            echo "</tr>";
        }

        // End the table
        echo "</tbody></table>";
    } else {
        echo "No players found in this position.";
    }

    // Close the connection
    $conn->close();
}
?>