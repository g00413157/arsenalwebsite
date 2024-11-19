<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<center><img src="cannon.jpg" width="500px">
<h3> Create User </h3></center>
    <form id="awfc_userForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Create User"><br>
        </div>
    </form>

    <div id="awfc_response"></div>

    <script>
        $(document).ready(function() {
            $('#awfc_userForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting the traditional way

                $.ajax({
                    type: 'POST',
                    url: 'createUser.php', 
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#awfc_response').html(response); // Update the response div with the result
                    },
                    error: function(xhr, status, error) {
                        $('#awfc_response').html('Error: ' + error); // Display error message
                    }
                });
            });
        });
    </script>
</body>
</html>
