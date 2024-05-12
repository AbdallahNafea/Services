<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
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
            background-color: #2C3E50; /* Changed card background color */
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
            padding: 12px; /* Increased padding for better spacing */
            text-align: left;
            border-bottom: 1px solid #444;
            color: #ddd;
        }
        th {
            background-color: #34495E; /* Changed table header background color */
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #2C3E50; /* Changed even row background color */
        }
    </style>
</head>
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

?>
<body>
    <div class='card'>
        <h2>Admin Profile</h2>
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
    <a class="btn btn-primary" href="homepage.html">Go To Home</a>
</body>
</html>
