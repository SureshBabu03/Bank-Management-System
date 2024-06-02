<?php

$servername = "localhost";
$username = "MADHAN";
$password = "MADHAN@123";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the account number from user input
$accountnumber = $_POST["accountnumber"];

// Validate the account number
$sql = "SELECT * FROM user WHERE accountnumber = '$accountnumber'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Invalid account number";
    exit;
}

$sql = "SELECT SUM(amount) as amount FROM deposit WHERE accountnumber = '$accountnumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $deposit_amount = $row["amount"];
    }
} else {
    echo "0 results";
}

$sql = "SELECT SUM(amount) as amount FROM withdraw WHERE accountnumber = '$accountnumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $withdraw_amount = $row["amount"];
    }
} else {
    echo "0 results";
}

$balance = $deposit_amount - $withdraw_amount;

echo "Your current balance is: $balance";

$conn->close();

?>