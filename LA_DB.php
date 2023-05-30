<?php
$hostname = "localhost:3301";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($hostname, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create database
$sql = "CREATE DATABASE Student";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " .
        mysqli_error($conn);
}
//Close the connection
mysqli_close($conn);
?>

<?php
// Connect to the database
$hostname = "localhost:3308"; // Change to your host name
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "ibp"; // Change to your MySQL database name

$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Create the "students" table
$sql = "CREATE TABLE students (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
gender ENUM('Male', 'Female') NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
//Close the connection
mysqli_close($conn);
?>

