<?php
// Start the session to access session variables
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to index.php after logout
header("location: index.php");
exit;
?>
