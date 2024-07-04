<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // If you have set a password, enter it here
$dbname = "chiron_dental_appointments";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, appointment_date, appointment_time, message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $date, $time, $message);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$message = $_POST['message'];

if ($stmt->execute()) {
    echo "Appointment booked successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
