<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Contacts</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "my_database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_contact'])) {
        $contact_id = $_POST['contact_id'];

        // Delete contact from database
        $sql_delete = "DELETE FROM contacts WHERE id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        
        if (!$stmt_delete) {
            die("Error preparing delete statement: " . $conn->error);
        }
        
        $stmt_delete->bind_param("i", $contact_id);

        if ($stmt_delete->execute()) {
            echo "Contact with ID $contact_id has been deleted successfully.<br>";
        } else {
            echo "Error deleting contact: " . $stmt_delete->error . "<br>";
        }

        $stmt_delete->close();
    }
}

// Fetch contacts from database
$sql_select = "SELECT * FROM contacts";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    echo "<h2>List of Users</h2>";
    echo "<table>";
    echo "<tr><th>Users ID</th><th>Name</th><th>Email</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>";
        echo "<form method='post' onsubmit='return confirm(\"Are you sure you want to delete this contact?\");'>";
        echo "<input type='hidden' name='contact_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='delete_contact' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No contacts found.";
}

$conn->close();
?>
</body>
</html>
