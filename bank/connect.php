<?php
$conn = mysqli_connect('localhost', 'MADHAN', 'MADHAN@123', 'bank');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['name']) && ($_POST['email']) && ($_POST['password']) && ($_POST['confirmpassword'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $sql_query = "INSERT INTO signup (name, email, password, confirmpassword) VALUES ('$name','$email','$password','$confirmpassword')";
    if(mysqli_query($conn,$sql_query)) {
        header("Location: login.php");
        exit;
    } else {
        echo "error:" . $sql."". mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
