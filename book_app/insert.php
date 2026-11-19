
<?php

include 'db.php';

$acc_no = $_POST['accession_no'];
$title = $_POST['title'];
$authors = $_POST['authors'];
$edition = $_POST['edition'];
$publisher = $_POST['publisher'];

$sql = "INSERT INTO books
(accession_no, title, authors, edition, publisher)
VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt, "sssss",
    $acc_no, $title, $authors, $edition, $publisher
);

if (mysqli_stmt_execute($stmt)) {
    echo "<h3>Book details added successfully!</h3>";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

echo "<br><a href='index.html'>Go Back</a>";

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
