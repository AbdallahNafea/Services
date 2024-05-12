<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Form</title>
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

    // Retrieve data from the database
    $result = $conn->query("SELECT * FROM admintable");

    if ($result->num_rows > 0) {
        echo "<div class='card'>";
        echo "<h2>User Information</h2>";
        echo "<table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["Admin_ID"] . "</td>
                <td>" . $row["Nameadmin"] . "</td>
                <td>" . $row["Email"] . "</td>
                <td>" . $row["Password"] . "</td>
            </tr>";
        }
        echo "</table>";
        echo "</div>"; // close card

        // Add the back button
        echo "<a class='btn btn-secondary' href='homepage.html'>Back To Home</a>";
    } else {
        echo "<div class='card'>";
        echo "No admin data available";
        echo "</div>"; // close card
    }

    $conn->close();
    ?>
</body>
</html>
