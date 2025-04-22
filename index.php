<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsenal Fan Website</title>
    <link rel="icon" type="image/png" href="crest.png">
    <link rel="stylesheet" href="styless.css">
</head>

<body>
<?php include 'header.php'; ?>


    <!-- Modal for Login and Signup -->
    <div id="backdrop" class="modal-backdrop" style="display:none;"></div>
    <div id="modal_front" class="modal" style="display:none;"></div>

    <section id="about-us">
        <h1 id="titles">Arsenal Fan Website</h1><br>
        <div class="container">
            <h1 class="first">About Us</h1>
            <p>Welcome to the official fan website for <b>Arsenal Football Club</b>!</p>
            <p>As passionate supporters of Arsenal , we aim to bring fans together, share the latest news, and celebrate the incredible achievements of this iconic team.</p>

            <h2 class="first">Our Mission</h2>
            <p>We are dedicated to supporting and celebrating Arsenal, the pioneers of womens football in England and one of the most successful clubs in the history of the sport.</p>

            <h2 class="first">Our History</h2>
            <p>Founded in 1987, Arsenal  have set the standard for excellence in women's football. From our early triumphs in the FA Women’s National League to lifting the UEFA Women’s Champions League, Arsenal Women continue to inspire with their powerful performances.</p>

            <h2 class="first">Join the Community</h2>
            <p>Whether youve been following the team for years or are new to womens football, you are part of the Arsenal Women fan community.</p>

            <h2 class="first">Follow Us</h2>
            <a href="https://www.instagram.com/arsenalwfc/"><img src="players/insta.png" alt="Instagram" style="width:110px;height:110px;"></a>  
            <a href="https://www.tiktok.com/@arsenalwfc"><img src="players/tiktok.png" alt="TikTok" style="width:110px;height:90px;"></a>  
            <a href="https://x.com/ArsenalWFC"><img src="players/x.png" alt="X" style="width:90px;height:90px;"></a> 
        </div>

        <h2 class="first">Other Pages</h2>
        <a href="awfcInventory.php"><img src="merch/merch.png" alt="Merchandise" style="width:300px;height:300px;"></a>
        <a href="showplayers.php"><img src="players/team.jpg" alt="Players" style="width:500px;height:300px;"></a>
        <a href="showmatches.php"><img src="players/match.jpg" alt="Matches" style="width:400px;height:300px;"></a>
    </section>

    <script src="js/logincreate.js"></script>
    <script src="js/cart.js"></script>
</body>
</html>
