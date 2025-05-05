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
        <section class="nav">
        <?php require_once "template\header.php";?>
        </section>
    <div class="form-container">
            <h1>Login</h1>
            <form action="login_process.php" method="post">
            <label class="formcolor" for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <br>
            <label class="formcolor" for="password">Password:</label>
            <input type="text" id="password" name="password" required>
            <br>
            <br>

            <button type="submit">Login</button>
        </form>
        <br>
                <!-- Add a button to redirect to the register page -->
        <button onclick="window.location.href='signup.php';">Sing Up</button>
    </div>
    <footer>
        <div class="footer-content">
            <ul>
                <h3>Contact Us</h3>
                <p>Email: KingKicks@Gmail.com</p>
                <p>Phone: 123-456-7890</p>
                <p>Address: 123 KingKicks Lane</p>
            </ul>
        </div>
        <div class="footer-content">
            <ul>
                <h3>Founders</h3>
                <p>Favour Godson</p>
                <p>Luke Douglas</p>
                <p>Nathan Lynch</p>
            </ul>
        </div>
        <div class="footer-content">
            <ul>
                <h3>Follow Us</h3>
                <li class="social-icons">
                    <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>