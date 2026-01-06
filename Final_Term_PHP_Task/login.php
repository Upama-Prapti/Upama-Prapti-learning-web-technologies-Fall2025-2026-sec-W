<?php
session_start();
include 'db.php';

$errors = array();
$login_attempts = isset($_SESSION['login_attempts']) ? $_SESSION['login_attempts'] : 0;
$last_attempt = isset($_SESSION['last_attempt']) ? $_SESSION['last_attempt'] : 0;
$current_time = time();

if ($login_attempts >= 5 && ($current_time - $last_attempt) < 300) {
    $errors[] = "Too many login attempts. Please try again after 5 minutes.";
}

if (isset($_POST['login'])) {
    $username_email = trim($_POST['username_email']);
    $password = $_POST['password'];

    if (empty($username_email)) {
        $errors[] = "Username or email cannot be empty";
    }

    if (empty($password)) {
        $errors[] = "Password cannot be empty";
    }

    if (strpos($username_email, '@') !== false) {
        if (!filter_var($username_email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    }

    if (empty($errors) && $login_attempts < 5) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username_email, $username_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['login_attempts'] = 0;
                header("Location: dashboard.php");
                exit();
            } else {
                $errors[] = "Invalid password";
                $_SESSION['login_attempts'] = $login_attempts + 1;
                $_SESSION['last_attempt'] = $current_time;
            }
        } else {
            $errors[] = "Username or email not found";
            $_SESSION['login_attempts'] = $login_attempts + 1;
            $_SESSION['last_attempt'] = $current_time;
        }
        $stmt->close();
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login Page</h2>

<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
?>

<form method="post">
    Username/Email: <input type="text" name="username_email" value="<?php echo isset($_POST['username_email']) ? htmlspecialchars($_POST['username_email']) : ''; ?>" required><br><br>
    
    Password: <input type="password" name="password" required><br><br>
    
    <button type="submit" name="login">Login</button>
</form>

<p><a href="registration.php">Don't have an account? Register</a></p>
</body>
</html>

