<?php
// Connect to the database
$host = "localhost:3301"; // Change to your host name
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "ibp"; // Change to your MySQL database name

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    // Validate the form data
    if (empty($full_name) || empty($email) || empty($gender)) {
        echo "Please fill in all required fields";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address";
    } else {
        // Insert the data into the database
        $conn = mysqli_connect($host, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO students (full_name, email, gender) VALUES ('$full_name', '$email', '$gender')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }

        // Close the connection
        mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
</head>
<body>
<h1>Student Registration Form</h1>
<form method="POST" action="validation.php">
    <label for="full_name">Full Name:</label>
    <input type="text" id="full_name" name="full_name" required><br><br>

    <label for="email">Email Address:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label>Gender:</label>
    <input type="radio" id="male" name="gender" value="Male" required>
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="Female" required>
    <label for="female">Female</label><br><br>

    <input type="submit" value="Submit">
</form>
</body>
</html>