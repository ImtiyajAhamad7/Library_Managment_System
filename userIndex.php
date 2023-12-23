
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul class="nav justify-content-center">
  
  <li class="nav-item">
    <a class="nav-link" href="logout.php">logout</a>
  </li>

  </ul>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Book-Issued</h5>

    <p class="card-text"><?php

include 'conn.php';


$selectedUserID = 123; 

// Fetch total number of books issued to the selected user
$sql = "SELECT COUNT(*) AS TotalIssuedBooks FROM Transactions WHERE UserID = $selectedUserID AND Returned = FALSE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalIssuedBooks = $row['TotalIssuedBooks'];
    echo "Total number of books issued to User ID $selectedUserID: " . $totalIssuedBooks;
} else {
    echo "No books issued to this user";
}
?>
</p>
    
    <a href="UserBook.php" class="card-link">UserBook Detail</a>
  </div>
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</body>
</html>