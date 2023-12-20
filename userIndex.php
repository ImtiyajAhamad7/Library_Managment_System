<?php

include 'conn.php';

// Start the session
session_start();

// Check if the user is logged in and has the admin role
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true )) {
    header("Location: login.php"); // Redirect to the login page
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Book-Issued</h5>

    <p class="card-text"></p>
    
    <a href="UserBook.php" class="card-link">UserBook Detail</a>
  </div>
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</body>
</html>