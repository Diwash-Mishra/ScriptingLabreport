<!DOCTYPE html>
<html>
<head>
    <title>Circle Properties</title>
</head>
<body>
    <h2>Circle Properties</h2>
    <form method="post">
        Enter radius: <input type="number" name="radius" step="any" required><br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the radius value from the form
    $radius = $_POST['radius'];

    // Create an instance of the Circle class with the provided radius
    $circle = new Circle($radius);

    // Display the results
    echo "Radius: " . $circle->getRadius() . "<br>";
    echo "Area: " . $circle->calculateArea() . "<br>";
    echo "Circumference: " . $circle->calculateCircumference() . "<br>";
}

class Circle {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * $this->radius * $this->radius;
    }

    public function calculateCircumference() {
        return 2 * pi() * $this->radius;
    }
}
?>
