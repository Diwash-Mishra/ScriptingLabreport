<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User Information</title>
</head>
<body>

    <?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "my_database");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if user ID is provided
    if (!isset($_GET['id'])) {
        // If ID is not provided, display a form to input ID
        echo '<form method="get" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                  <label for="id">Enter User ID:</label><br>
                  <input type="text" id="id" name="id" required><br><br>
                  <input type="submit" value="Submit">
              </form>';
        $conn->close();
        exit;
    }

    // Get user ID from the URL parameter
    $user_id = $_GET['id'];

    // Retrieve user information from the database
    $sql = "SELECT * FROM contacts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 0) {
        echo "User not found.";
        $stmt->close();
        $conn->close();
        exit;
    }

    // Fetch user information
    $user = $result->fetch_assoc();
    $stmt->close();

    // Display user information and update form
    echo "<p>User ID: " . $user['id'] . "</p>";
    echo "<p>Current Name: " . $user['name'] . "</p>";
    echo "<p>Current Email: " . $user['email'] . "</p>";

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get updated name and email from the form
        $updated_name = $_POST['name'];
        $updated_email = $_POST['email'];

        // Update user information in the database
        $sql_update = "UPDATE contacts SET name = ?, email = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        
        if (!$stmt_update) {
            die("Error preparing update statement: " . $conn->error);
        }
        
        $stmt_update->bind_param("ssi", $updated_name, $updated_email, $user_id);

        if ($stmt_update->execute()) {
            echo "User information updated successfully.";
        } else {
            echo "Error updating user information: " . $stmt_update->error;
        }

        $stmt_update->close();
    }

    $conn->close();
    ?>

    <h3>Update Form</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $user_id); ?>">
        <label for="name">New Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required><br><br>

        <label for="email">New Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
