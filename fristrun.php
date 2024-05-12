<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "full_stack";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select database
$conn->select_db($database);

// Admin table
$table_sql = "CREATE TABLE IF NOT EXISTS `admintable` (
    `Admin_ID` INT NOT NULL AUTO_INCREMENT,
    `Nameadmin` VARCHAR(50) NOT NULL,
    `Email` VARCHAR(100) NOT NULL,
    `Password` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`Admin_ID`)
)";
if ($conn->query($table_sql) === TRUE) {
    echo "Admintable created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$table_sql = "CREATE TABLE IF NOT EXISTS `request` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Email` VARCHAR(255) NOT NULL,
    `Serves` VARCHAR(255) NOT NULL,
    `Date` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Id`)
)";

if ($conn->query($table_sql) === TRUE) {
    echo "Request table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
