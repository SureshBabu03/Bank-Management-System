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

    // Check if form is submitted
    if (isset($_POST["update"])) {
        $accountnumber = $_POST["accountnumber"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $dob = $_POST["dob"];
        $phonenumber = $_POST["phonenumber"];
        $address = $_POST["address"];

        // Update user details
        $sql = "UPDATE user SET firstname='$firstname', lastname='$lastname', dob='$dob', phonenumber='$phonenumber', address='$address' WHERE accountnumber='$accountnumber'";

        if ($conn->query($sql) === TRUE) {
            echo "User details updated successfully.";
        } else {
            echo "Error updating user details: " . $conn->error;
        }
    }

    // Close database connection
    $conn->close();
?>
