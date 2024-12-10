<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="crest.png">
    <title>Merchandise Shop</title>
    <link rel="stylesheet" href="styless.css"> <!-- Ensure the CSS file path is correct -->
</head>

<body>
<header class="header">
        <!-- Left navigation links -->
        <nav class="nav-links">
            <a id="plyrs" href="showplayers.php">Players</a>
            <a id="matchs" href="showmatches.php">Matches</a>
            <a id="merch" href="awfcInventory.php">Merchandise</a>
        </nav>

        <!-- Centered logo -->
        <div class="logo">
            <a href="index.php">
                <img src="cannon.png" alt="Logo">
            </a>
        </div>

        <!-- Right navigation link -->
        <nav class="nav-links">
        
        <a href="userForm.php">Sign Up</a>
        <a href="loginpage.php">Sign In</a>
    </nav>
    </header>
    <main>
        <center>
            <h1>Merchandise Shop</h1>
        </center>

        <!-- Filters for merchandise -->
        <div>
            <form id="awfc_form">
                <!-- Merchandise Name Dropdown -->
                <label for="merch_name"><b>Merchandise Name:</b></label>
                <select name="merch_name" id="merch_name" onchange="updateAWFCStatus()">
                    <option value="" disabled selected>Select a Name</option>
                    <option value="">All</option>
                    <?php
                    // Database connection
                    $conn = new mysqli("localhost", "root", "", "arsenalwebsitedb");
                    if ($conn->connect_error) {
                        die("Connection Failed: " . $conn->connect_error);
                    }

                    // Fetch merchandise names
                    $result = $conn->query("SELECT DISTINCT merch_name FROM merchandise ORDER BY merch_name");
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . htmlspecialchars($row["merch_name"]) . "\">" . htmlspecialchars($row["merch_name"]) . "</option>";
                        }
                    }

                    $conn->close(); // Close connection after fetching merchandise names
                    ?>
                </select>

                <!-- Status Checkboxes -->
                <div class="inline-form">
                    <b>Select Status:</b><br>
                    <?php
                    // Reconnect to the database to fetch statuses
                    $conn = new mysqli("localhost", "root", "", "arsenalwebsitedb");
                    if ($conn->connect_error) {
                        die("Connection Failed: " . $conn->connect_error);
                    }

                    // Fetch statuses
                    $result2 = $conn->query("SELECT DISTINCT status FROM merchandise ORDER BY status");
                    if ($result2 && $result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            echo "<label>";
                            echo "<input type=\"checkbox\" name=\"status[]\" value=\"" . htmlspecialchars($row["status"]) . "\" onclick=\"updateAWFCStatus()\">" . htmlspecialchars($row["status"]);
                            echo "</label>";
                        }
                    }

                    $conn->close(); // Close connection after fetching statuses
                    ?>
                </div>
            </form>
        </div>

        <br>

        <!-- Merchandise and cart containers -->
        <div id="container">
            <div class="box" id="merch_response">
                <!-- Merchandise will be dynamically loaded here -->
            </div>
            <div class="box" id="cart_response">
                <!-- Cart updates will be displayed here -->
            </div>
        </div>
    </main>

    <script>
       
        const user_id = <?php echo isset($_SESSION['username']) ? json_encode($_SESSION['username']) : 'null'; ?>;

        // Function to update the merchandise list based on selected filters
        function updateAWFCStatus() {
            const formData = new FormData(document.getElementById('awfc_form'));
            formData.append("merch_name", document.getElementById('merch_name').value);

            fetch('awfcshow.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    }
                })
                .then(data => {
                    document.getElementById('merch_response').innerHTML = data;
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        // Function to add an item to the cart
        function addToCart(id) {
            const formData = new FormData();
            formData.append('item', id);
            formData.append('user_id', user_id);

            fetch('cart.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('cart_response').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error)
                });
                
        }

        // Function to remove an item from the cart
        function removeFromCart(id) {
            const formData = new FormData();
            formData.append('remove_item', id);
            formData.append('user_id', user_id);

            fetch('cart.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    }
                })
                .then(data => {
                    document.getElementById('cart_response').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error)
                });
                
        }

        // Function to trigger checkout
        function checkoutItems(shopping_cart, userid, total_price) {
            if (!user_id) {
                // If user is not logged in, prompt them to log in
                alert('Please log in to use the cart!');
                // Redirect to login page
                window.location.href = 'loginpage.php';
                return;
            }

            const formData = new FormData();
            formData.append('shopping_cart', shopping_cart);
            formData.append('user_id', user_id);
            formData.append('total_price', total_price);

            fetch('checkout.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    }
                })
                .then(data => {
                    document.getElementById('cart_response').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error)
                });
        }
    </script>
</body>

</html>
