<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chiron_dental_appointments";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $date = $conn->real_escape_string($_POST['date']);
  $time = $conn->real_escape_string($_POST['time']);
  $message = $conn->real_escape_string($_POST['message']);

  $sql = "INSERT INTO appointments (name, email, phone, date, time, message) VALUES ('$name', '$email', '$phone', '$date', '$time', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
