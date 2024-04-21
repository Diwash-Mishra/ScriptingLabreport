<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "student");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample data for insertion
$name = "Diwash Dada";
$grade = "11";

// SQL query to insert a record
$sql = "INSERT INTO student (name, grade) VALUES ('$name', '$grade')";

if ($conn->query($sql) === TRUE) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
