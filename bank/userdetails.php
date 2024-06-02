
<?php
// Set up database connection
$servername = "localhost";
$username = "MADHAN";
$password = "MADHAN@123";
$dbname = "bank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Retrieve user details for selected account number
$sql = "SELECT * FROM user WHERE accountnumber='".$_GET["accountnumber"]."'";
$result = $conn->query($sql);

// Display user details
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Account Number: " . $row["accountnumber"] . "<br>";
        echo "First Name: " . $row["firstname"] . "<br>";
        echo "Last Name: " . $row["lastname"] . "<br>";
        echo "Date of Birth: " . $row["dob"] . "<br>";
        echo "Account Number: " . $row["phonenumber"] . "<br>";
        echo "Address: " . $row["address"] . "<br>";
        // Add more columns as needed
    }
} else {
    echo "User not found.";
}
// Close database connection
$conn->close();
?>
