<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Your MySQL username (default is root)
$password = "admin"; // Your MySQL password
$dbname = "libraryms"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
