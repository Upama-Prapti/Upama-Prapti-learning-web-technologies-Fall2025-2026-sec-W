<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<p>You have successfully logged in.</p>
<p><a href="login.php?logout=1">Logout</a></p>
</body>
</html>

