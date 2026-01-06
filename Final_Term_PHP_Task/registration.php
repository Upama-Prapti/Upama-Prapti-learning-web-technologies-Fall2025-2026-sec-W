<?php
include 'db.php';

$errors = array();
$success = "";

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $full_name = trim($_POST['full_name']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $terms = isset($_POST['terms']) ? $_POST['terms'] : '';

    if (empty($username)) {
        $errors[] = "Username cannot be empty";
    } elseif (preg_match('/[^a-zA-Z0-9_]/', $username)) {
        $errors[] = "Username cannot contain special characters";
    }

    if (empty($email)) {
        $errors[] = "Email cannot be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } else {
        $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();
        if ($result->num_rows > 0) {
            $errors[] = "Email already exists";
        }
        $checkEmail->close();
    }

    if (empty($password)) {
        $errors[] = "Password cannot be empty";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must contain at least one uppercase letter";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must contain at least one number";
    } elseif (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $errors[] = "Password must contain at least one special character";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    if (empty($full_name)) {
        $errors[] = "Full name cannot be empty";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $full_name)) {
        $errors[] = "Full name can only contain letters and spaces";
    }

    if (empty($contact)) {
        $errors[] = "Contact number cannot be empty";
    } elseif (!preg_match('/^[0-9]{11}$/', $contact)) {
        $errors[] = "Contact number must be 11 digits";
    }

    if (empty($address)) {
        $errors[] = "Address cannot be empty";
    }

    if (empty($terms)) {
        $errors[] = "You must agree to the terms and conditions";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, full_name, contact, address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $email, $hashed_password, $full_name, $contact, $address);
        
        if ($stmt->execute()) {
            $success = "Registration successful!";
        } else {
            $errors[] = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
<h2>Registration Page</h2>

<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
if ($success) {
    echo "<p style='color:green;'>$success</p>";
}
?>

<form method="post">
    Username: <input type="text" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required><br><br>
    
    Email: <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required><br><br>
    
    Password: <input type="password" name="password" required><br><br>
    
    Confirm Password: <input type="password" name="confirm_password" required><br><br>
    
    Full Name: <input type="text" name="full_name" value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>" required><br><br>
    
    Contact Number: <input type="text" name="contact" value="<?php echo isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : ''; ?>" required><br><br>
    
    Address: <textarea name="address" required><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea><br><br>
    
    <input type="checkbox" name="terms" value="1" required> I agree to the terms and conditions<br><br>
    
    <button type="submit" name="register">Register</button>
</form>

<p><a href="login.php">Already have an account? Login</a></p>
</body>
</html>

