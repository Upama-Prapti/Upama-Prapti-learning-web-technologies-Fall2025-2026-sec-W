<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 3</title>
</head>
<body>
<h2>Lab Task 3: Loops and Iteration</h2>

<?php
echo "<h3>1. For loop - Numbers from 1 to 20:</h3>";
for ($i = 1; $i <= 20; $i++) {
    echo $i . " ";
}
echo "<br>";

echo "<h3>2. While loop - Even numbers from 1 to 20:</h3>";
$j = 1;
while ($j <= 20) {
    if ($j % 2 == 0) {
        echo $j . " ";
    }
    $j++;
}
echo "<br>";

echo "<h3>3. Associative Array - Fruits:</h3>";
$fruits = array(
    "apple" => "red",
    "banana" => "yellow",
    "grape" => "purple",
    "orange" => "orange",
    "mango" => "yellow"
);

echo "<h3>4. Foreach loop - Print fruit name and color:</h3>";
foreach ($fruits as $fruitName => $fruitColor) {
    echo $fruitName . " is " . $fruitColor . "<br>";
}

echo "<h3>5. Break statement - First 5 numbers:</h3>";
for ($k = 1; $k <= 20; $k++) {
    echo $k . " ";
    if ($k == 5) {
        break;
    }
}
echo "<br>";
?>

</body>
</html>

