
<?php

include 'db.php';

$search_title = $_GET['search_title'];

$sql = "SELECT * FROM books WHERE title LIKE ?";

$stmt = mysqli_prepare($conn, $sql);

$search = "%" . $search_title . "%";

mysqli_stmt_bind_param($stmt, "s", $search);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

echo "<h2>Search Results</h2>";

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1' cellpadding='10'>";

    echo "<tr>
    <th>Accession Number</th>
    <th>Title</th>
    <th>Authors</th>
    <th>Edition</th>
    <th>Publisher</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td>" . htmlspecialchars($row['accession_no']) . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['authors']) . "</td>";
        echo "<td>" . htmlspecialchars($row['edition']) . "</td>";
        echo "<td>" . htmlspecialchars($row['publisher']) . "</td>";

        echo "</tr>";
    }

    echo "</table>";

} else {

    echo "<p>No books found matching that title.</p>";

}

echo "<br><a href='index.html'>Go Back</a>";

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
