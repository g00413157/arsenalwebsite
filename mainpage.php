<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsenal Women</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arsenal+SC:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <style>
         body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-image: linear-gradient(to right, #a0f1eb ,#ca94ff);
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
            position:center;
            align-items: center;
           
        }

        .logo img {
            height: 100px; /* Adjust logo size */
        
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

</body>
</html>
