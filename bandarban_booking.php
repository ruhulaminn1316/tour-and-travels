<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "tour";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$package = $_POST['package'];
$preferred_date = $_POST['preferred_date'];
$special_requests = $_POST['special_requests'];

// Insert data into database
$sql = "INSERT INTO bandarban_booking (full_name, email, phone, package, preferred_date, special_requests)
        VALUES ('$full_name', '$email', '$phone', '$package', '$preferred_date', '$special_requests')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successfully submitted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
