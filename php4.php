<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "student");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select records of students in grade 11
$sql = "SELECT id, name, grade FROM student WHERE grade = '11'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Grade: " . $row["grade"]. "<br>";
    }
} else {
    echo "No records found for grade 11 students.";
}

// Close connection
$conn->close();
?>
