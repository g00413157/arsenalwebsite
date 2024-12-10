<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
<header class="header">
    <nav class="nav-links">
        <a id="plyrs" href="showplayers.php">Players</a>
        <a id="matchs" href="showmatches.php">Matches</a>
        <a id="merch" href="awfcInventory.php">Merchandise</a>
    </nav>
    <div class="logo">
        <a href="index.php">
            <img src="cannon.png" alt="Logo">
        </a>
    </div>
    <nav class="nav-links">
        <a href="userForm.php">Sign Up</a>
        <a href="loginpage.php">Sign In</a>
    </nav>
</header>

<h1>Login Page</h1>
<div class="container">
    <div class="box" id="login_box">
        <form id="login_form" onsubmit="loginUser(event)">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required><br> <!-- Updated type -->
            <div id="buttons">
                <input type="submit" value="Login">
            </div>
        </form>
        <div class="box" id="login_response"></div>
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
    

    
</body>
</html>
