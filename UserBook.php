<?php
// Assuming you have a database connection established
include 'conn.php';

// Replace 'selectedUserID' with the actual UserID for which you want to display issued books
$selectedUserID = 123; // Replace with the actual UserID

// Fetch details of books issued to the selected user
$sql = "SELECT Transactions.TransactionID, Books.Title AS BookTitle, Books.Author, Transactions.IssueDate, Transactions.ReturnDate 
        FROM Transactions 
        INNER JOIN Books ON Transactions.BookID = Books.BookID 
        WHERE Transactions.UserID = $selectedUserID AND Transactions.Returned = 0"; // Modify this query according to your schema

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Books Issued to User</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h2>Books Issued to User</h2>
        <table>
            <tr>
                <th>Transaction ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Issue Date</th>
                <th>Return Date</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["TransactionID"] . "</td>
                <td>" . $row["BookTitle"] . "</td>
                <td>" . $row["Author"] . "</td>
                <td>" . $row["IssueDate"] . "</td>
                <td>" . $row["ReturnDate"] . "</td>
              </tr>";
    }
    
    echo "</table></body></html>";
} else {
    echo "No books issued to this user";
}
?>
