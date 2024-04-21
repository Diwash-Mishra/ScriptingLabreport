<?php
// Check if the "visited" cookie is set
if (isset($_COOKIE['visited'])) {
    echo "Welcome back! You have visited before.";
} else {
    echo "Welcome! This is your first visit.";
}
?>
