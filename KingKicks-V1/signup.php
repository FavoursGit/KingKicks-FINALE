<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Kicks</title>
    <link rel="stylesheet" href="css/home.css">
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <section class="nav">
            <ul>
                <li><a href="homepage.html"><img src="images/White_KingKicks.png" width="60" height="50"></a></li>
                <li class="dropdown">
                    <a href="brands.html">Brands</a>
                    <div class="dropdown-content">
                        <a href="Nike.php">Nike</a>
                        <a href="#">Jordan</a>
                        <a href="#">New Balance</a>
                        <a href="#">Yeezys</a>
                    </div>
                </li>
                </li>
                <li><a href="men.php">Shop All</a></li>
                <li><a href="new.php">New</a></li>
                <li><a href="Sale.php">Sale</a></li>
                <li><input type="text" placeholder="Search"></li>
                <li><a href="signup.php"><img src="images/login.png" width="50" height="50"></a></li>
                <li><img src="images/cart.png" width="50" height="50"></li>
            </ul>
        </section>
    </header>
    <div class="form-container">
            <h1>Sign Up Details</h1>
            <form action="Purchasecomplete.html" method="post">
            <label class="formcolor" for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <br>


            <label class="formcolor" for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <br>
            <br>


            <label class="formcolor" for="city">City:</label>
            <input type="text" id="city" name="city" required>
            <br>
            <br>

            <label class="formcolor" for="zip">ZIP Code:</label>
            <input type="text" id="zip" name="zip" required>
            <br>
            <br>

            <label class="formcolor" for="country">Country:</label>
            <input type="text" id="country" name="country" required>
            <br>
            <br>

            <input type="submit" value="Submit">
        </form>
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