<?php
// Start a session
session_start();

// Database connection
include 'conn.php';

// Get username and password from the form
$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

// Protect against SQL injection (you should use prepared statements)
$enteredUsername = mysqli_real_escape_string($conn, $enteredUsername);
$enteredPassword = mysqli_real_escape_string($conn, $enteredPassword);

// Query to fetch user with entered credentials
$sql = "SELECT * FROM Users WHERE Username='$enteredUsername' AND Password='$enteredPassword'";
$result = $conn->query($sql);

// Check if a user was found with the entered credentials
if ($result->num_rows > 0) {
    // Authentication successful
    $row = $result->fetch_assoc();
    $_SESSION['loggedin'] = true;

    if ($row["Role"] == "Admin") {
        header("Location: AdminPanel.php");
        exit(); // Ensure to stop script execution after redirection
    } else {
        header("Location: userIndex.php");
        exit(); // Ensure to stop script execution after redirection
    }
} else {
    // Authentication failed 
    $_SESSION['loggedin'] = false;
    header("Location: login.php");
    exit(); // Ensure to stop script execution after redirection
}

$conn->close();
?>
