<?php
session_start();
require_once 'C:\laragon\www\KingKicks\DBconfig.php';
require_once 'C:\laragon\www\KingKicks\classes.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user = User::getUserById($user_id);

if (!$user) {
    echo "User not found.";
    exit();
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $card_number = isset($_POST['card_number']) ? trim($_POST['card_number']) : null;
    $expiration_date = isset($_POST['expiration_date']) ? trim($_POST['expiration_date']) : null;
    $current_password = isset($_POST['current_password']) ? $_POST['current_password'] : null;
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : null;
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;

    // Validate card details
    if (strlen($card_number) !== 16 || !ctype_digit($card_number)) {
        $error_message = "Invalid card number. It must be 16 digits.";
    } elseif (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expiration_date)) {
        $error_message = "Invalid expiration date. Format must be MM/YY.";
    } elseif ($new_password && strlen($new_password) < 8) {
        $error_message = "New password must be at least 8 characters long.";
    } elseif ($new_password && $new_password !== $confirm_password) {
        $error_message = "New password and confirm password do not match.";
    } elseif ($new_password && !password_verify($current_password, $user->getPassword())) {
        $error_message = "Current password is incorrect.";
    } else {
        // Update the user's card details and password in the database
        $pdo = Database::connect();
        $hashed_password = $new_password ? password_hash($new_password, PASSWORD_BCRYPT) : $user->getPassword();

        $stmt = $pdo->prepare("UPDATE users SET CARD_NUMBER = ?, EXPIRATION_DATE = ?, PASSWORD = ? WHERE USER_ID = ?");
        $stmt->execute([$card_number, $expiration_date, $hashed_password, $user_id]);

        header("Location: profile.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <?php include 'template/header.php'; ?>

    <h2>Edit Card Details</h2>
    <?php if (!empty($error_message)): ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <form action="editprofile.php" method="POST">
        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" id="card_number" value="<?php echo htmlspecialchars($user->getCardNumber()); ?>" required>

        <label for="expiration_date">Expiration Date (MM/YY):</label>
        <input type="text" name="expiration_date" id="expiration_date" value="<?php echo htmlspecialchars($user->getExpirationDate()); ?>" required>

        <h3>Change Password</h3>
        <label for="current_password">Current Password:</label>
        <input type="password" name="current_password" id="current_password" required>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" id="new_password">

        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" name="confirm_password" id="confirm_password">

        <button type="submit">Save Changes</button>
    </form>
    <?php require_once 'template/footer.php'; ?>
</body>
</html>