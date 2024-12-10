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

<b>
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
  
        
       
    <section id="about-us">
    <h1 id="titles">Arsenal Women</h1><br>
        <div class="container">
            <h1 class="first">About Us</h1>
            <p>Welcome to the official fan website for **Arsenal Women’s Football Club**!</p>
            <p>As passionate supporters of Arsenal Women, we aim to bring fans together, share the latest news, and 
                #celebrate the incredible achievements of this iconic team.</p>

            <h2 class="first">Our Mission</h2>
            <p>We are dedicated to supporting and celebrating Arsenal Women, the pioneers of women’s football in England 
                and one of the most successful clubs in the history of the sport. Our mission is to offer Arsenal 
                fans a hub for all things related to the team, from match reports and player profiles to community events and 
                fan interaction.</p>

            <h2 class="first">Our History</h2>
            <p>Founded in 1987, Arsenal Women have set the standard for excellence in women's football.
                 From our early triumphs in the FA Women’s National League to lifting the UEFA Women’s Champions League, 
                 Arsenal Women continue to inspire with their powerful performances. 
                 As fans, we honor this proud history and are excited to see what the future holds for this incredible team.</p>

            <h2 class="first">Join the Community</h2>
            <p>Whether you’ve been following the team for years or are new to women’s football, you are part of the Arsenal Women 
                fan community. Join us on this exciting journey by engaging with our content, sharing your passion, and supporting 
                Arsenal Women through every match.</p>
            <p>Get involved in discussions, participate in fan events, and connect with other Gunners across the globe. 
                Together, we are stronger, and together, we will continue to support Arsenal Women to even greater success!</p>

            <h2 class="first">Follow Us</h2>
            <p>Stay updated by following us on social media for the latest news, matchday updates, and behind-the-scenes content. 
                Let’s make sure everyone knows the power and passion of Arsenal Women!</p>
                <a href="https://www.instagram.com/arsenalwfc/">
        <img src="players/insta.png" alt="instagram" style="width110px;height:110px;">
    </a>  
    <a href="https://www.tiktok.com/@arsenalwfc">
        <img src="players/tiktok.png" alt="tiktok" style="width:110px;height:90px;">
    </a>  
    <a href="https://x.com/ArsenalWFC">
        <img src="players/x.png" alt="x" style="width:90px;height:90px;">
    </a> 
        </div>
    

        <h2 class="first">Other Pages </h2>
    
    <a href="awfcInventory.php">
        <img src="merch/merch.png" alt="Merchandise " style="width:300px;height:300px;">
    </a>
    
    <a href="showplayers.php">
        <img src="players/team.jpg" alt="Players " style="width:500px;height:300px;">
    </a>
    
    <a href="showmatches.php">
        <img src="players/match.jpg" alt="Matches " style="width:400px;height:300px;">
    </a>
    </section>
</body>

</html>