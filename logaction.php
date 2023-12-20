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
    $_SESSION['loggedin'] = true;

    while($row = mysqli_fetch_assoc($result)){

        session_start();

       
        $uid = $row["Role"];

        if($uid=="Admin"){
            header("Location: AdminPanel.php");
        }else{
            header("Location: userIndex.php");
        }
    }
    

    // Redirect to a dashboard or other page
    
} else {
    // Authentication failed
    echo "Invalid username or password.";
    // Redirect back to the login page
    header("Location: login.php");
}

$conn->close();
?>
