<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Kicks</title>
    <link rel="stylesheet" href="css/Nike.css">
    <script src="js/home.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header>
        <section class="nav">
            <ul>
                <li><a href="homepage.php"><img src="images/White_KingKicks.png" width="60" height="50"></a></li>
                <li class="dropdown">
                    <a href="brands.php">Brands</a>
                    <div class="dropdown-content">
                        <a href="#">Nike</a>
                        <a href="#">Jordan</a>
                        <a href="#">New Balance</a>
                        <a href="#">Yeezys</a>
                    </div>
                </li>
                <li><a href="men.php">Men</a></li>
                <li><a href="women.php">Women</a></li>
                <li><a href="new.php">New</a></li>
                <li><a href="Sale.php">Sale</a></li>
                <li><input type="text" placeholder="Search"></li>
                <li><a href="https://www.instagram.com/"><img src="images/login.png" width="50" height="50"></a></li>
                <li><img src="images/cart.png" width="50" height="50"></li>
            </ul>
        </section>
    </header>
    
    <aside class="ProductSideBar">
        <h3>Nike</h3>
        <p>Nike is a global leader in athletic footwear, apparel, and equipment, known for innovation and performance. Founded in 1964, <!--the brand has become synonymous with high-quality sportswear and cutting-edge technology. With iconic products like the Air Max, Nike Air Jordans, and the Swoosh logo, Nike continues to inspire athletes and fashion enthusiasts around the world.--></p> 
        <h3>Filter Shoes</h3>
    
        <label for="color">Color:</label>
        <select id="color">
            <option value="black">Black</option>
            <option value="white">White</option>
            <option value="red">Red</option>
        </select>
    
        <!--
        <label for="size">Size:</label>
        <input type="number" id="size" min="5" max="15" placeholder="Enter size">
        -->
        <div class="slidecontainer">
            <p>Price</p>
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
          </div>
        <a href="#">Apply Filters</a>
    </aside>
    
    <!-- Main Content -->
    <div class="MainContent">
        <section class="trending">
            <div class="product-box">
                <img src="images/shoes5-Photoroom.png" alt="Image 1">
                <div class="price">€899</div>
            </div>
            <div class="product-box">
                <img src="images/shoes6-Photoroom.png" alt="Image 2">
                <div class="price">€210</div>
            </div>
            <div class="product-box">
                <img src="images/shoes7-Photoroom.png" alt="Image 3">
                <div class="price">€115</div>
            </div>
            <div class="product-box">
                <img src="images/shoes8-Photoroom.png" alt="Image 4">
                <div class="price">€1,729</div>
            </div>
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