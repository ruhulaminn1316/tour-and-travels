<?php
// Database connection variables
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "tour"; // Replace with your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];
    $preferred_date = $_POST['preferred_date'];
    $special_requests = $_POST['special_requests'];

    // Insert data into the database
    $sql = "INSERT INTO coxsbazar_booking (full_name, email, phone, package, preferred_date, special_requests)
            VALUES ('$full_name', '$email', '$phone', '$package', '$preferred_date', '$special_requests')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successfully submitted!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
