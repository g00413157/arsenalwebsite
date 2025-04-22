/* Show the Create User Modal */

/* Show Login Modal 
let showSignIn = () => {
    let modal = document.getElementById("modal_front");
    modal.style.display = "block";
    document.getElementById("backdrop").style.display = "block";

    let modal_header = '<span class="close cursor" onclick="closeModal()">&times;</span><br><div class="modal-content">';
    let modal_content = `
        <form id="loginForm">
            <label for="username">Username:</label>
            <input type="text" id="login_username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="login_password" name="password" required><br>

            <div id="buttons">
                <input type="submit" value="Login">
            </div>
        </form>

        <div id="login_response"><br></div>

        <button class="create" onclick="showSignUp()">Create User</button>
    </div>
    `;

    modal.innerHTML = modal_header + modal_content;

    // Add event listener after modal is created
    document.getElementById("loginForm").addEventListener("submit", loginUser);
};

/* Close Modal */
let closeModal = () => {
    document.getElementById("modal_front").style.display = "none";
    document.getElementById("backdrop").style.display = "none";
};

/* Show the Create User Modal */
let showSignUp = () => {
    const modal = document.getElementById("modal_front");
    const backdrop = document.getElementById("backdrop");

    // Display the modal and backdrop
    modal.style.display = "block";
    backdrop.style.display = "block";

    // Create modal content
    const modalHTML = `
        <span class="close cursor" onclick="closeModal()">&times;</span><br>
        <div class="modal-content">
            <form id="signupForm">
                <label for="signup_username">Username:</label>
                <input type="text" id="signup_username" name="username" required><br>

                <label for="signup_email">Email:</label>
                <input type="email" id="signup_email" name="email" required><br>

                <label for="signup_password">Password:</label>
                <input type="password" id="signup_password" name="password" required><br>

                <div id="buttons">
                    <input type="submit" value="Sign Up">
                </div>
            </form>

            <div id="signup_response"><br></div>
            <br>
            <button class="login" onclick="showSignIn()">Sign In User</button>
        </div>
    `;

    // Inject the content into the modal
    modal.innerHTML = modalHTML;

    // Attach submit listener to the form after it's in the DOM
    const form = document.getElementById("signupForm");
    if (form) {
        form.addEventListener("submit", createUser);
    }
};

/* Create User */
let createUser = (event) => {
    event.preventDefault(); // Stop default form submission

    const username = document.getElementById("signup_username").value.trim();
    const email = document.getElementById("signup_email").value.trim();
    const password = document.getElementById("signup_password").value;

    // Basic validation
    if (!username || !email || !password) {
        document.getElementById("signup_response").innerHTML = "<p style='color:red;'>All fields are required.</p>";
        return;
    }

    // Send POST request to register.php
    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.text())
    .then(data => {
        const responseBox = document.getElementById("signup_response");
        if (data.includes("success")) {
            responseBox.innerHTML = "<p style='color:green;'>Registration successful!</p>";
            setTimeout(closeModal, 1000); // Close modal after a second
        } else {
            responseBox.innerHTML = `<p style='color:red;'>${data}</p>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById("signup_response").innerHTML = "<p style='color:red;'>Server error. Please try again.</p>";
    });
};
