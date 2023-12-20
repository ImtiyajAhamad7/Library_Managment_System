<?php
// Assuming you have a database connection established
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Insert user data into the Users table
    $sql = "INSERT INTO Users (Name, Username, Password, Role) VALUES ('$name', '$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
