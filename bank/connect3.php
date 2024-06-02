<?php
$conn = mysqli_connect('localhost', 'MADHAN', 'MADHAN@123', 'bank');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['accountnumber']) && isset($_POST['email']) && isset($_POST['amount'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $accountnumber = mysqli_real_escape_string($conn, $_POST['accountnumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $date = date("Y-m-d");

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email address";
    } else {
        // Check if account number exists
        $check_account_query = "SELECT * FROM user WHERE accountnumber = '$accountnumber'";
        $result = mysqli_query($conn, $check_account_query);
        if (mysqli_num_rows($result) == 0) {
            echo "Error: Account number not found";
        } else {
            // Insert deposit in database
            $stmt = mysqli_prepare($conn, "INSERT INTO withdraw (firstname, lastname, accountnumber, email, date, amount) VALUES (?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssssd", $firstname, $lastname, $accountnumber, $email, $date, $amount);
            if (mysqli_stmt_execute($stmt)) {
                echo "Withdraw successfully";
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($conn);
}
?>
