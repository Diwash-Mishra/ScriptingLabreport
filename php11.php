<?php
session_start();
$_SESSION['last_activity'] = time();
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 1800) {
    session_unset();
    session_destroy();
    echo "Your session has timed out due to inactivity.";
    exit;
}
echo "Session timeout is set to 30 minutes of inactivity.";
?>
