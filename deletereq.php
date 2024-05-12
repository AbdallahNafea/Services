<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Delete ya man</title>
</head>
<style>
    body {
            background-color: #4E657A;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
</style>
<body>
    <div class="container">
        <h1>Delete Request</h1>
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
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM request WHERE id=$id";
                $result = $conn -> query($sql);
                $row = $result -> fetch_assoc();
            }
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $sql = "DELETE FROM request WHERE id=$id";
                if($conn->query($sql) === TRUE){
                    header('Location:showreq.php');
                    exit;
                }else{
                    echo "error".$conn->error;
                }
            }
        ?>
        <form method="post">
            <button class="btn btn-danger" type="submit">Yes, Delete</button>
            <a class="btn btn-secondary" href="showreq.php">Cancel</a>
        </form>
    </div>    
</body>
</html>