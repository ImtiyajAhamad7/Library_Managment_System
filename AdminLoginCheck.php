<?php
// Start the session
include 'conn.php';
session_start();

// Check if the user is logged in and has the admin role
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['Role'] === 'Admin')) {
    header("Location: login.php"); // Redirect to the login page if not logged in as admin
    exit;
}
?>

