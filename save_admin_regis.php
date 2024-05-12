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

$nameadmin = mysqli_real_escape_string($conn, $_POST['nameadmin']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if ($nameadmin === $specific_person_name && $email === $specific_person_email && $password === $specific_person_password) {
    $sql = "INSERT INTO admintable (nameadmin, email, password) VALUES ('$nameadmin', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: homepage.html"); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Sorry,but there is one person admin .');</script>"; 
}

mysqli_close($conn);
?>
