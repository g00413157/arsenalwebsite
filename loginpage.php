<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "arsenalwebsitedb";
$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styless.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div id="backdrop" class="modal-backdrop" style="display:none;"></div>
    <div id="modal_front" class="modal" style="display:none;"></div>

    <h1>Login Page</h1>
    <div class="container">
        <div class="box" id="login_box">
        <form method="POST" action="loginProcess.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br> <!-- Updated type -->

            <div id="buttons">
                <input type="submit" value="Login">
            </div>

        </form>


        </div>
        
    </div>

    <script>
        function loginUser(event) {
            event.preventDefault();

            const form = document.getElementById('login_form');
            const formData = new FormData(form);

            fetch('login.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    const loginResponse = document.getElementById('login_response');
                    if (data.includes("Login successful!")) {
                        loginResponse.innerHTML = `<p style="color: green;">${data}</p>`;

                    } else {
                        loginResponse.innerHTML = `<p style="color: red;">${data}</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('login_response').innerHTML = `<p style="color: red;">An error occurred. Please try again later.</p>`;
                });
        }

    </script>



    <script src="js/logincreate.js"></script>
</body>

</html>