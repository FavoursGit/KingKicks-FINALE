<?php
session_start();
include 'DBconfig.php';
include 'classes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Kicks</title>
    <link rel="stylesheet" href="css/signup.css">
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header>
        <?php include 'template\header.php';?>
    <div class="form-container">
            <h1>Sign Up Details</h1>
<form action="signupcomplete.php" method="post">
    <label class="formcolor" for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br><br>

    <label class="formcolor" for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label class="formcolor" for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>

    <button type="submit">Sign Up</button>
</form>
    </div>
    
</body>
</html>