<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$create = "CREATE DATABASE IF NOT EXISTS education";
if (mysqli_query($conn, $create)) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Select the database
mysqli_select_db($conn, "education");

// Create table
$sql = "CREATE TABLE IF NOT EXISTS studentRecords (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    email VARCHAR(50)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table studentRecords created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Insert records
$insert = "INSERT INTO studentRecords (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$insert .= "INSERT INTO studentRecords (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$insert .= "INSERT INTO studentRecords (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com');";

if (mysqli_multi_query($conn, $insert)) {
    echo "New records created successfully<br>";
    // Flush results from multi_query
    while (mysqli_more_results($conn)) {
        mysqli_next_result($conn);
    }
} else {
    echo "Error inserting data: " . mysqli_error($conn);
}

// Now run the SELECT query
$select = "SELECT * FROM studentRecords WHERE id=2";
$result = mysqli_query($conn, $select);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "No record found with ID = 2<br>";
}

mysqli_close($conn);
?>

</body>
</html>
