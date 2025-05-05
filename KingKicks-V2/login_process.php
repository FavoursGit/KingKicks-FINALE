<?php
session_start();
require_once "DBconfig.php";
require_once "classes.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Get the username and password from the POST request
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Fetch the user using the User class
        $user = User::getUserByUsername($username);

        if ($user && password_verify($password, $user['PASSWORD'])) {
            // Password is correct, log the user in
            $_SESSION['user_id'] = $user['USER_ID'];
            $_SESSION['username'] = $user['USERNAME'];
            // Redirect to the homepage
            header("Location: homepage.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
}
?>