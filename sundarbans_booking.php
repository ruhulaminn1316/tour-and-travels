<?php
// Database connection variables
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "tour"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];
    $dates = $_POST['dates'];
    $special = $_POST['special'];

    // Insert data into the database
    $sql = "INSERT INTO sundarbans_booking (name, email, phone, package, travel_dates, special_requests)
            VALUES ('$name', '$email', '$phone', '$package', '$dates', '$special')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successfully submitted!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
