<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsenal Women</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styless.css">
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
    <h1>Arsenal Women</h1>
    
</body>
</html>
