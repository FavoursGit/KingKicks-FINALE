<?php
session_start(); // Start the session at the top of the file

include 'C:\laragon\www\KingKicks\DBconfig.php'; // Include database connection
include 'C:\laragon\www\KingKicks\classes.php'; // Include classes

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch the user details
$user_id = $_SESSION['user_id'];
$user = User::getUserById($user_id);

if (!$user) {
    echo "User not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <title>King Kicks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<?php require_once 'template\header.php'; ?>
    <body>

      <h2>Your Profile</h2>
      <div class="profile-info">
    <p><strong>Email:</strong> 
        <?php 
        echo !empty($user->getEmail()) 
            ? htmlspecialchars($user->getEmail()) 
            : "Add this info with the button below"; 
        ?>
    </p>
    <p><strong>Password:</strong> ********</p>
    <p><strong>Card Number:</strong> 
        <?php 
        echo !empty($user->getCardNumber()) 
            ? htmlspecialchars($user->getCardNumber()) 
            : "Add this info with the button below"; 
        ?>
    </p>
    <p><strong>Expiration Date:</strong> 
        <?php 
        echo !empty($user->getExpirationDate()) 
            ? htmlspecialchars($user->getExpirationDate()) 
            : "Add this info with the button below"; 
        ?>
    </p>
</div>
<a href="editprofile.php" class="edit-button">Edit Personal Details</a>
    </body>
    <?php require_once 'template\footer.php';?>

</html>
    
     
    
   
    