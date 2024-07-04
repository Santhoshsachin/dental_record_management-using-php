<?php
$servername = "localhost";  // Change if your MySQL server is different
$username = "root";         // Change to your MySQL username
$password = "";             // Change to your MySQL password
$dbname = "chiron_dental_appointments";  // Change to the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
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
  echo "New appointment booked successfully";
  // Redirect to the success page or any other page after successful insertion
  header("Location: success.html");
} else {
  echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
