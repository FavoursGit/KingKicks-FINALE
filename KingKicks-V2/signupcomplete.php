<?php
include "DBconfig.php"; // Include your database connection file
include "classes.php";  // Include your classes file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Establish a database connection
    $conn = Database::connect();

    // Sanitize user input
    $username = isset($_POST['username']) ? trim($_POST['username']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Check if all fields are filled
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Check password strength
    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the username already exists
    $check_sql = "SELECT * FROM users WHERE username = :username";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->execute(['username' => $username]);

    if ($check_stmt->rowCount() > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Insert the new user
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);

        if ($stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashed_password])) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error: Could not insert user.";
        }
    }

    // Close the database connection
    $conn = null;
}
?>