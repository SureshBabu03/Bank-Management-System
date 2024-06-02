<?php
$conn = mysqli_connect('localhost', 'MADHAN', 'MADHAN@123', 'bank');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['firstname']) && ($_POST['lastname']) && ($_POST['dob']) && ($_POST['accountnumber']) && ($_POST['email']) && ($_POST['phonenumber'])&& ($_POST['address']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $accountnumber = $_POST['accountnumber'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    
    $sql_query = "INSERT INTO user(firstname, lastname, dob, accountnumber, email, phonenumber, address) 
    VALUES ('$firstname', '$lastname', '$dob', '$accountnumber', '$email', '$phonenumber', '$address')";
    
    if (mysqli_query($conn, $sql_query))
    {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
	}
	?>