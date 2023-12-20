<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  
  <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="issued.php">Issue Book</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="addbook.php">AddBook</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="logout.php">logout</a>
  </li>

  </ul>


  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Books</h5>
   
    <p class="card-text"> <?php
include 'conn.php';

$sql = "SELECT COUNT(*) AS TotalBooks FROM Books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalBooks = $row['TotalBooks'];
    echo "Total number of books: " . $totalBooks;
} else {
    echo "0 results";
}
?>
   </p>
    <a href="book.php" class="card-link">Books Available</a>
    
  </div>
</div>

<!-- book issued -->

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Book Issued</h5>
   
    <p class="card-text"><?php
// Assuming you have a database connection established
include 'conn.php';

$sql = "SELECT COUNT(*) AS TotalIssuedBooks FROM Transactions WHERE Returned = FALSE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalIssuedBooks = $row['TotalIssuedBooks'];
    echo "Total number of issued books: " . $totalIssuedBooks;
} else {
    echo "No issued books at the moment";
}
?>
</p>
    <a href="TotalIssued.php" class="card-link">Check Issued Book</a>
   
  </div>
</div>
 




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>