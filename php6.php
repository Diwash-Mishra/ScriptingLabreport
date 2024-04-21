<!DOCTYPE html>
<html>
<head>
    <title>Find Greatest Number</title>
</head>
<body>
    <h2>Find Greatest Number</h2>
    <form method="post">
        Enter first number: <input type="number" name="num1"><br><br>
        Enter second number: <input type="number" name="num2"><br><br>
        Enter third number: <input type="number" name="num3"><br><br>
        <input type="submit" value="Find Greatest">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $result = max($_POST['num1'], $_POST['num2'], $_POST['num3']);
        echo "<p>The greatest number among {$_POST['num1']}, {$_POST['num2']}, and {$_POST['num3']} is: $result</p>";
    }
    ?>
</body>
</html>
