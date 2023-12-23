<?php
// Assuming you have a database connection established
include 'conn.php';
include 'AdminLoginCheck.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedUserID = $_POST['user']; // Assuming you have a form field with name 'user' for selecting the user
    $selectedBookID = $_POST['book']; // Assuming you have a form field with name 'book' for selecting the book

    // Validate the user and book IDs, perform necessary checks

    // Process the issuance of the book to the user
    $issueDate = date("Y-m-d"); // Get the current date
    $returnDate = date("Y-m-d", strtotime("+15 days")); // Set the return date 15 days ahead

    $sql = "INSERT INTO Transactions (UserID, BookID, IssueDate, ReturnDate) VALUES ('$selectedUserID', '$selectedBookID', '$issueDate', '$returnDate')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Book issued successfully!";
    } else {
        echo "Error issuing the book: " . $conn->error;
    }
}
?>
<!-- HTML form for issuing a book -->
<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Issue Book to User</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
            <?php
// Fetch UserID and Name from Users table
$sql = "SELECT UserID, Name FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<select class='form-control' id='user' name='user' required>";
    echo "<option value=''>Select User</option>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['UserID'] . "'>" . $row['UserID'] . " - " . $row['Name'] . "</option>";
    }
    echo "</select>";
} else {
    echo "0 results";
}
?>

            </div>
            <?php
// Fetch BookID and Title from Books table where books are available
$sql = "SELECT BookID, Title FROM Books
        WHERE BookID NOT IN (SELECT BookID FROM Transactions WHERE ReturnDate IS NULL)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<select class='form-control' id='book' name='book' required>";
    echo "<option value=''>Select Book</option>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['BookID'] . "'>" . $row['BookID'] . " - " . $row['Title'] . "</option>";
    }
    echo "</select>";
} else {
    echo "No available books at the moment";
}
?>

            </div>
            <button type="submit" class="btn btn-primary">Issue Book</button>
        </form>
    </div>
</body>
</html>
