<?php
session_start();
// Database connection details
$servername = "localhost";
$username = "MADHAN";
$password = "MADHAN@123";
$dbname = "bank";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from form
$email = $_POST['email'];
$password = $_POST['password'];


// Query to check if the user exists in the database
$query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // User exists, redirect to some page
    header("Refresh:2; url= adminpage.php");
    $_SESSION['email'] = $email;
} else {
    // User does not exist, show error message
    echo '<p>Invalid email or password</p>';
}
?>