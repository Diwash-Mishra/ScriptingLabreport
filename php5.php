<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "student");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to delete a record of a student with ID 3
$sql = "DELETE FROM student WHERE id = 3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close connection
$conn->close();
?>
