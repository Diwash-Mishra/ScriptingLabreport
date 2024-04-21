<?php
<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>
    <h2>Factorial Calculator</h2>
    <form method="post">
        Enter a number:
        <input type="text" name="number">
        <input type="submit" value="Calculate Factorial">
    </form>
</body>
</html>
<?php
function factorial($n) {
    if ($n == 0 || $n == 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

// Test the factorial function with user input
if (isset($_POST['number'])) {
    $number = intval($_POST['number']);
    if ($number >= 0) {
        $result = factorial($number);
        echo "The factorial of $number is: $result";
    } else {
        echo "Please enter a non-negative integer.";
    }
}
?>