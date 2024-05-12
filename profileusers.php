<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
            background-color: #2C3E50; 
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
            padding: 12px; 
            text-align: left;
            border-bottom: 1px solid #444;
            color: #ddd;
        }
        th {
            background-color: #34495E;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #2C3E50; 
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "full_stack";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $specific_person_id = 1; 
    $sql = "SELECT * FROM admintable WHERE admin_id = $specific_person_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $specific_person_name = $row["Nameadmin"];
        $specific_person_email = $row["Email"];
        $specific_person_password = $row["Password"];
    } else {
        echo "Admin not found";
    }

    mysqli_close($conn);
    ?>
    <div class='card'>
        <h2>User Profile</h2>
        <table>
            <tr>
                <th>Name</th>
                <td><?php echo $specific_person_name; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $specific_person_email; ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo $specific_person_password; ?></td>
            </tr>
        </table>
    </div>
    <a class="btn btn-primary" href="indexuser.html">Go To Home</a>
</body>
</html>
