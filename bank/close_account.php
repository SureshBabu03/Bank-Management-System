<?php
    // Set up database connection
    $servername = "localhost";
    $username = "sureshbabu";
    $password = "password";
    $dbname = "bank";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if (isset($_POST["close"])) {
        $accountnumber = $_POST["accountnumber"];

        // Delete account from user table
        $sql = "DELETE FROM user WHERE accountnumber='$accountnumber'";
        if ($conn->query($sql) === TRUE) {
            echo "Account number $accountnumber has been closed.";
        } else {
            echo "Error closing account: " . $conn->error;
        }
    }

    // Close database connection
    $conn->close();
?>
