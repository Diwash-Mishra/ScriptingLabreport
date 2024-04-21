<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Change this if your database username is different
$password = ""; // Change this if your database password is different
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to database successfully";
}

// Close connection
$conn->close();
?>
