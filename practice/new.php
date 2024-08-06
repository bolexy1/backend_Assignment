<?php
// Assume you have a database connection established ($conn)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input
    $loginIdentifier = $_POST['login_identifier']; // Username, email, or phone number
    $password = $_POST['password'];

    // Validate input (you can add more validation here)
    if (empty($loginIdentifier) || empty($password)) {
        echo "Please enter both login identifier and password.";
        exit;
    }

    // Query the database to check if the user exists
    $sql = "SELECT * FROM users WHERE username = ? OR email = ? OR phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $loginIdentifier, $loginIdentifier, $loginIdentifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify password (you should hash and compare securely in production)
        if (password_verify($password, $user['password'])) {
            // Successful login
            echo "Welcome, " . $user['username'] . "!"; // You can redirect to a dashboard page here
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        <label for="login_identifier">Username, Email, or Phone:</label>
        <input type="text" id="login_identifier" name="login_identifier" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
