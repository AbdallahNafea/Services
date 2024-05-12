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
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $serves = $_POST['serves'];
    $date = $_POST['date'];
    $sql = "INSERT INTO request(Email, Serves, Date) VALUES ('$email', '$serves', '$date')";
    if($conn->query($sql) === TRUE){
        header('Location: requestuseradd.php');
        exit;
    }else{
        echo "Error:".$sql ."<br>" .$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    body {
            background-color: #4E657A;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
</style>
</head>
<body>
    <div class="container">
        <h1>Send Request</h1>
    <form action="requestuseradd.php" method="post">
    Email: <input class="form-control" type="text" name="email" required><br>
    Serves: <input class="form-control" type="text" name="serves" required><br>
    Date: <input class="form-control" type="date" name="date" required><br>
        <button class="btn btn-success" type="submit">Send Request</button><br><br>
    </form>
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #4E657A;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .card {
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #444;
        }
        th {
            background-color: #555;
        }
        tr:nth-child(even) {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">My Requests</h1>
        <div class="table-container">
            <table class="table table-striped table-bordered">
            <thead class="thead-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Serves</th>
                        <th>Date</th>
                        <th>Response</th>
                    </tr>
                </thead>
                <tbody>
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
                    
                    $sql = "SELECT id, Email, Serves, Date FROM request";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='text-center'>{$row['id']}</td>";
                                echo "<td class='text-center'>{$row['Email']}</td>";
                                echo "<td class='text-center'>{$row['Serves']}</td>";
                                echo "<td class='text-center'>{$row['Date']}</td>";
                                echo "<td class='text-center' button.textContent = 'Response was done'</td>";
                                echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No Products Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <p><a class="btn btn-secondary" href="indexuser.html">Back to Home Page</a></p>
    </div>
</body>
</html>
