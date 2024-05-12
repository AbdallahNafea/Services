<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "full_stack";

// Information of the specific person
$specific_person_name = "AbdallahNafe3"; 
$specific_person_email = "nafe3@gmail.com"; 
$specific_person_password = "12345"; 

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if the login attempt is for the specific person
    if ($username === $specific_person_name && $password === $specific_person_password) {
        // Successful login for the specific person
        header("Location: homepage.html"); // Redirect to dashboard
        exit();
    } else {
        // Incorrect username or password
        echo "<script>alert('Incorrect username or password');</script>";
    }
}

mysqli_close($conn);
?>
