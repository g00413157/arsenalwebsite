<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="styless.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
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
            <a href="mainpage.php">
                <img src="cannon.png" alt="Logo">
            </a>
        </div>

        <!-- Right navigation link -->
        <nav class="nav-links">
        <a href="userForm.php">Sign Up</a>
        <a href="loginpage.php">Sign In</a>
    </nav>
    </header>
<br>
<h1>Create A user</h1>
<br>
<form id="awfc_userForm">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="text" id="password" name="password" required><br><br>

    <div id="buttons">
        <label>&nbsp;</label>
        <input type="submit" value="Create User"><br>
    </div>
</form>
<div id="awfc_response"></div>

<script>
    $(document).ready(function(){
        // Fix: Correct ID selector for the form
        $('#awfc_userForm').on('submit', function(event) {
            event.preventDefault();

            // AJAX request to the server
            $.ajax({
                type: 'POST',
                url: 'createUser.php', // Make sure this URL points to your PHP script
                data: $(this).serialize(),
                success: function(response) {
                    // Fix: Correct ID for response element
                    $('#awfc_response').html(response);
                },
                error: function(xhr, status, error) {
                    $('#awfc_response').html('Error: ' + error);
                }
            });
        });
    });
</script>
</body>
</html>
