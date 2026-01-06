<!DOCTYPE html>
<html>
<head>
    <title>Lab Task 2</title>
</head>
<body>
<h2>Lab Task 2: Conditional Statements</h2>

<?php
$temperature = 15;

if (is_numeric($temperature)) {
    if ($temperature < 10) {
        echo "It's cold<br>";
    } elseif ($temperature >= 10 && $temperature <= 25) {
        echo "It's warm<br>";
    } else {
        echo "It's hot<br>";
    }
} else {
    echo "Invalid temperature value<br>";
}

$day = 3;

if (is_numeric($day) && $day >= 1 && $day <= 7) {
    switch ($day) {
        case 1:
            echo "Monday<br>";
            break;
        case 2:
            echo "Tuesday<br>";
            break;
        case 3:
            echo "Wednesday<br>";
            break;
        case 4:
            echo "Thursday<br>";
            break;
        case 5:
            echo "Friday<br>";
            break;
        case 6:
            echo "Saturday<br>";
            break;
        case 7:
            echo "Sunday<br>";
            break;
        default:
            echo "Invalid day number<br>";
    }
} else {
    echo "Invalid day value. Please enter a number between 1 and 7.<br>";
}
?>

</body>
</html>

