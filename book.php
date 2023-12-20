
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>

<?php

include 'conn.php';

$sql = "SELECT * FROM Books";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>ISBN</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["BookID"] . "</td>
                <td>" . $row["Title"] . "</td>
                <td>" . $row["Author"] . "</td>
                <td>" . $row["Category"] . "</td>
                <td>" . $row["ISBN"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
