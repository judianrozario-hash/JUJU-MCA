
<?php
$conn = mysqli_connect("localhost", "root", "", "company_db");

// Part 2: Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$message = "";
if (isset($_POST['save'])) {
    $name = $_POST['emp_name'];
    $email = $_POST['email'];
    $dept = $_POST['department'];
    $salary = $_POST['salary'];

    // Part 6: Insert data into database
    $sql = "INSERT INTO employees
    (emp_name, email, department, salary)
    VALUES ('$name', '$email', '$dept', '$salary')";

    // Part 7: Check whether data is saved
    if (mysqli_query($conn, $sql)) {
        $message = "Employee saved successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Form</title>
</head>
<body>

<h2>Add Employee Details</h2>

<p><b><?php echo $message; ?></b></p>

<form method="POST" action="">

Name:<br>
<input type="text" name="emp_name" required><br><br>

Email:<br>
<input type="email" name="email" required><br><br>

Department:<br>
<input type="text" name="department" required><br><br>

Salary:<br>
<input type="number" name="salary" required><br><br>

<button type="submit" name="save">Save Employee</button>

</form>

</body>
</html>
