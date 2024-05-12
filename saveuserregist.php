<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "full_stack";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nameadmin = mysqli_real_escape_string($conn, $_POST['nameadmin']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO admintable (nameadmin, email, password) VALUES ('$nameadmin', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    header("Location:  indexuser.html"); // Redirect after successful registration
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>