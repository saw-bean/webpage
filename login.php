<?php

//connect.php

$host = "localhost";
$username = "root";
$password = "";
$database = "Registration";

//connect to the database
$conn = mysqli_connect($host, $username, $password, $database);


// Get login information from form
$email = $_POST["email_login"];
$password = $_POST["password_login"];


// Query the database for a user with the same email and password
$sql = "SELECT * FROM register WHERE email='$email' && password='$password'";
$result = $conn->query($sql);

// If a user is found, log them in
if ($result->num_rows > 0) {
    // Start a session
    session_start();
    // Set a session variable to indicate that the user is logged in
    $_SESSION["logged_in"] = true;
    // Redirect to the dashboard page
    echo "<script>
    alert('Logged in sucessfully!!!');
    window.location.href='Front_page.html';
    </script>";
} else {
    // If no user is found, display an error message
    echo "Invalid email or password. Please try again.";
}


?>