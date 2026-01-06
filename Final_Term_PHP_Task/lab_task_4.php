<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 4</title>
</head>
<body>
<h2>Lab Task 4: Functions in PHP</h2>

<?php
function sum($a, $b) {
    return $a + $b;
}

echo "<h3>1. Sum Function:</h3>";
echo "sum(5, 10) = " . sum(5, 10) . "<br>";
echo "sum(15, 25) = " . sum(15, 25) . "<br>";
echo "sum(100, 200) = " . sum(100, 200) . "<br>";

function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

echo "<h3>2. Factorial Function:</h3>";
$factNum = 5;
echo "factorial($factNum) = " . factorial($factNum) . "<br>";

function is_prime($n) {
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

echo "<h3>3. Prime Number Check:</h3>";
$numbers = array(2, 7, 10, 17, 20, 23);
foreach ($numbers as $num) {
    if (is_prime($num)) {
        echo "$num is prime<br>";
    } else {
        echo "$num is not prime<br>";
    }
}
?>

</body>
</html>

