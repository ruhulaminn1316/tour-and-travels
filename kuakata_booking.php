<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "tour"; // Use your database name

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

// Insert data into the database
$sql = "INSERT INTO kuakata_bookings (full_name, email, phone, package, preferred_date, special_requests)
        VALUES (?, ?, ?, ?, ?, ?)";

// Use prepared statements for security
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $full_name, $email, $phone, $package, $preferred_date, $special_requests);

if ($stmt->execute()) {
    echo "Booking successfully submitted!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
