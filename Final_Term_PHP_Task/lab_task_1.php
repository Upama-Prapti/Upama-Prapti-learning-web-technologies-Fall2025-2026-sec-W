<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 1</title>
</head>
<body>
<h2>Lab Task 1: Variables and Operations</h2>

<?php
$stringVar = "Hello World";
$integerVar = 25;
$floatVar = 3.14;
$booleanVar = true;

echo "<h3>1. Variables Declaration:</h3>";
echo "String: " . $stringVar . "<br>";
echo "Integer: " . $integerVar . "<br>";
echo "Float: " . $floatVar . "<br>";
echo "Boolean: " . ($booleanVar ? 'true' : 'false') . "<br>";

$num1 = 10;
$num2 = 5;
$num3 = 15.5;
$num4 = 7.2;

echo "<h3>2. Arithmetic Operations:</h3>";
$addition = $num1 + $num2;
$subtraction = $num1 - $num2;
$multiplication = $num1 * $num2;
$division = $num1 / $num2;

echo "Addition ($num1 + $num2): " . $addition . "<br>";
echo "Subtraction ($num1 - $num2): " . $subtraction . "<br>";
echo "Multiplication ($num1 * $num2): " . $multiplication . "<br>";
echo "Division ($num1 / $num2): " . $division . "<br>";

$floatAdd = $num3 + $num4;
$floatSub = $num3 - $num4;
$floatMul = $num3 * $num4;
$floatDiv = $num3 / $num4;

echo "Float Addition ($num3 + $num4): " . $floatAdd . "<br>";
echo "Float Subtraction ($num3 - $num4): " . $floatSub . "<br>";
echo "Float Multiplication ($num3 * $num4): " . $floatMul . "<br>";
echo "Float Division ($num3 / $num4): " . $floatDiv . "<br>";

echo "<h3>3. Sum using echo and print:</h3>";
$sum1 = 20;
$sum2 = 30;
echo "Sum of $sum1 and $sum2 is: " . ($sum1 + $sum2) . "<br>";
print "Sum of $sum1 and $sum2 is: " . ($sum1 + $sum2) . "<br>";

echo "<h3>4. Using var_dump():</h3>";
var_dump($stringVar);
echo "<br>";
var_dump($integerVar);
echo "<br>";
var_dump($floatVar);
echo "<br>";
var_dump($booleanVar);
?>

</body>
</html>

