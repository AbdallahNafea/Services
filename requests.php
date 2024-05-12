<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "full_stack";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $serves = $_POST['serves'];
    $date = $_POST['date'];
    $sql = "INSERT INTO request(Email, Serves, Date) VALUES ('$email', '$serves', '$date')";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.html');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch and render data
$sql = "SELECT * FROM request";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Send Request</h1>
        <form action="requestuseradd.php" method="post">
            email: <input class="form-control" type="text" name="email" required><br>
            serves: <input class="form-control" type="text" name="serves" required><br>
            date: <input class="form-control" type="date" name="date" required><br>
            <button class="btn btn-primary" type="submit">Send Request</button><br><br>
            <a class="btn btn-secondary" href="index.php">Back To Home</a><br><br>
        </form>

    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
