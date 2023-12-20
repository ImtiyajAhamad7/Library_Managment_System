<?php
// Assuming you have a database connection established
include 'conn.php';

// Fetch details of issued books
$sql = "SELECT Transactions.TransactionID, Users.Name AS UserName, Books.Title AS BookTitle, Transactions.IssueDate, Transactions.ReturnDate 
        FROM Transactions 
        INNER JOIN Users ON Transactions.UserID = Users.UserID 
        INNER JOIN Books ON Transactions.BookID = Books.BookID 
        WHERE Transactions.Returned = FALSE"; // Updated query to fit the new table structure

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>
    <html>
    <head>
        <title>Issued Books</title>
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
        <h2>Issued Books</h2>
        <table>
            <tr>
                <th>Transaction ID</th>
                <th>User Name</th>
                <th>Book Title</th>
                <th>Issue Date</th>
                <th>Return Date</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["TransactionID"] . "</td>
                <td>" . $row["UserName"] . "</td>
                <td>" . $row["BookTitle"] . "</td>
                <td>" . $row["IssueDate"] . "</td>
                <td>" . $row["ReturnDate"] . "</td>
              </tr>";
    }
    
    echo "</table></body></html>";
} else {
    echo "No issued books at the moment";
}
?>
