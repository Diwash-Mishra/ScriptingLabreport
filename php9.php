<?php
// Check if the "username" cookie is set
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo "Username: $username";
} else {
    echo "Cookie 'username' not set.";
}
?>
