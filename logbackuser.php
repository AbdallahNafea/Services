<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "full_stack";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM admintable WHERE Nameadmin = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Successful login
        header("Location: indexuser.html"); // Redirect to dashboard
        exit();
    } else {
        // Incorrect username or password
        echo "<script>alert('Incorrect username or password');</script>";
    }
}

mysqli_close($conn);
?>
