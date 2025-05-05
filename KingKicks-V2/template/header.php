
<link rel="stylesheet" href="css/template.css">
<header>
        <section class="nav">
            <ul>
                <li><a href="homepage.php"><img src="images/White_KingKicks.png" width="60" height="50"></a></li>
                <li class="dropdown">
                    <a href="brands.php">Brands</a>
                    <div class="dropdown-content">
                        <a href="Nike.php">Nike</a>
                        <a href="Jordan.php">Jordan</a>
                        <a href="NewBalance.php">New Balance</a>
                        <a href="Yeezys.php">Yeezys</a>
                    </div>
                </li>
                </li>
                <li><a href="all.php">Shop All</a></li>
                <li><a href="new.php">New</a></li>
                <li><a href="sale.php">Sale</a></li>
                <li style="position: relative;">
                    <input type="text" id="search-bar" placeholder="Search for shoes">
                    <div id="search-results" class="search-results"></div>
                </li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="profile.php">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                        <li><a href="logout.php" class="logout-button">Logout</a></li>
                    <?php else: ?>
                        <a href="login.php"><img src="images/login.png" width="50" height="50"></a>
                    <?php endif; ?>
                </li>
                <li><a href="cart.php"><img src="images/cart.png" width="50" height="50" alt="Cart">
                </a></li>
            </ul>
        </section>
        <script src="js/search.js"></script>
    </header>