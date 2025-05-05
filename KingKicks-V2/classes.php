<?php
require_once 'DBconfig.php';
// Parent class
class products {
    protected $PRODUCT_ID;
    protected $PRODUCT_NAME;
    protected $PRICE;
    protected $BRAND;
    protected $AMOUNTORDERED;
    protected $STOCK;
    protected $image = [];

    public function __construct($PRODUCT_ID, $PRODUCT_NAME, $PRICE, $BRAND, $STOCK, $image) {
        if ($PRICE < 0) {
            throw new InvalidArgumentException("Price cannot be negative.");
        }
        if ($STOCK < 0) {
            throw new InvalidArgumentException("Stock cannot be negative.");
        }
        if (empty($PRODUCT_NAME)) {
            throw new InvalidArgumentException("Product name cannot be empty.");
        }
        $this->PRODUCT_ID = $PRODUCT_ID;
        $this->PRODUCT_NAME = $PRODUCT_NAME;
        $this->PRICE = $PRICE;
        $this->BRAND = $BRAND;
        $this->STOCK = $STOCK;
        $this->image = $image;
    }

    public function getProductId() {
        return $this->PRODUCT_ID;
    }

    public function getProductName() {
        return $this->PRODUCT_NAME;
    }

    public function getPrice() {
        return $this->PRICE;
    }

    public function getBrand() {
        return $this->BRAND;
    }

    public function getStock() {
        return $this->STOCK;
    }

    public function getImage() {
        return $this->image;
    }
    public static function getAllProducts() {
        $pdo = Database::connect();
        $stmt = $pdo->query('SELECT * FROM products');

        // Fetch all products
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convert each row into a products object
        return array_map(function($row) {
            return new products(
                $row['PRODUCT_ID'],
                $row['PRODUCT_NAME'],
                $row['PRICE'],
                $row['BRAND'],
                $row['STOCK'],
                $row['image']
            );
        }, $rows);
    }
}

class Shoe extends products {
    private $SIZE = [];

    public function __construct($PRODUCT_ID, $PRODUCT_NAME, $PRICE, $BRAND, $STOCK, $image, $SIZE) {
        parent::__construct($PRODUCT_ID, $PRODUCT_NAME, $PRICE, $BRAND, $STOCK, $image);
        $this->SIZE = $SIZE;
    }

    public function getSize() {
        return $this->SIZE;
    }

    public static function getAllShoes(){
        $pdo = Database::connect();
        $stmt = $pdo->query('SELECT * FROM products');

            // Fetch all at once
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Turn each row into a Shoe object
        return array_map(function($row) use ($pdo) {
             // Fetch sizes for the product
             $sizeStmt = $pdo->prepare("SELECT SIZE, stock FROM shoe WHERE PRODUCT_ID = ?");
             $sizeStmt->execute([$row['PRODUCT_ID']]);
             $SIZE = $sizeStmt->fetchAll(PDO::FETCH_ASSOC);

            return new Shoe(
                $row['PRODUCT_ID'],
                $row['PRODUCT_NAME'],
                $row['PRICE'],
                $row['BRAND'],
                $row['STOCK'],
                $row['image'],
                $SIZE
            );
        }, $rows);
    }

    public static function getShoeById($PRODUCT_ID) {
        $pdo = Database::connect();

        // Fetch product details
        $stmt = $pdo->prepare("SELECT * FROM products WHERE PRODUCT_ID = ?");
        $stmt->execute([$PRODUCT_ID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // Product not found
        }
        
        $sizeStmt = $pdo->prepare("SELECT SIZE, stock FROM shoe WHERE PRODUCT_ID = ?");
        $sizeStmt->execute([$PRODUCT_ID]);
        $SIZE = $sizeStmt->fetchAll(PDO::FETCH_ASSOC);

        return new Shoe(
            $row['PRODUCT_ID'],
            $row['PRODUCT_NAME'],
            $row['PRICE'],
            $row['BRAND'],
            $row['STOCK'],
            $row['image'],
            $SIZE
        );  
    }
    public static function searchShoes($query) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE PRODUCT_NAME LIKE ? OR BRAND LIKE ? LIMIT 5");
        $stmt->execute(['%' . $query . '%', '%' . $query . '%']);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convert each row into a Shoe object
        return array_map(function($row) use ($pdo) {
            // Fetch sizes for the product
            $sizeStmt = $pdo->prepare("SELECT SIZE, stock FROM shoe WHERE PRODUCT_ID = ?");
            $sizeStmt->execute([$row['PRODUCT_ID']]);
            $SIZE = $sizeStmt->fetchAll(PDO::FETCH_ASSOC);

            return new Shoe(
                $row['PRODUCT_ID'],
                $row['PRODUCT_NAME'],
                $row['PRICE'],
                $row['BRAND'],
                $row['STOCK'],
                $row['image'],
                $SIZE
            );
        }, $rows);
    }
}

class Cart{
    private $items = [];

    // Add a product to the cart
    public function addProduct($product, $quantity, $size) {
        $product_id = $product->getProductId();
        $key = $product_id . '_' . $size; // Unique key for product + size
    
        if (isset($this->items[$key])) {
            // If the product already exists in the cart, update the quantity
            $this->items[$key]['quantity'] += $quantity;
        } else {
            // Add a new product to the cart
            $this->items[$key] = [
                'product' => $product,
                'quantity' => $quantity,
                'size' => $size
            ];
        }
    
    }

    // Remove a product from the cart
    public function removeProduct($product_id, $size) {
        $key = $product_id . '_' . $size;
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
    }
    // Get all items in the cart
    public function getItems() {
        return $this->items;
    }

    // Get the total price of the cart
    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    // Clear the cart
    public function clear() {
        $this->items = [];
    }
}

class Review {
    private $REVIEW_ID;
    private $PRODUCT_ID;
    private $RATING;
    private $COMMENT;
    private $CREATED_AT;

    public function __construct($REVIEW_ID, $PRODUCT_ID, $RATING, $COMMENT, $CREATED_AT) {
        $this->REVIEW_ID = $REVIEW_ID;
        $this->PRODUCT_ID = $PRODUCT_ID;
        $this->RATING = $RATING;
        $this->COMMENT = $COMMENT;
        $this->CREATED_AT = $CREATED_AT;
    }
    public static function getReviewsByProductId($PRODUCT_ID) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM REVIEWS WHERE PRODUCT_ID = ? ORDER BY CREATED_AT DESC");
        $stmt->execute([$PRODUCT_ID]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $reviews = [];
        foreach ($rows as $row) {
            $reviews[] = new Review(
                $row['REVIEW_ID'],
                $row['PRODUCT_ID'],
                $row['RATING'],
                $row['COMMENT'],
                $row['CREATED_AT']
            );
        }
        return $reviews;
    }
    public static function addReview($PRODUCT_ID, $RATING, $COMMENT) {
        if ($RATING < 1 || $RATING > 5) {
            throw new InvalidArgumentException("Rating must be between 1 and 5.");
        }
        if (strlen($COMMENT) > 500) {
            throw new InvalidArgumentException("Comment cannot exceed 500 characters.");
        }
        
        $pdo = Database::connect();
        $stmt = $pdo->prepare("INSERT INTO REVIEWS (PRODUCT_ID, RATING, COMMENT) VALUES (?, ?, ?)");
        $stmt->execute([$PRODUCT_ID, $RATING, $COMMENT]);
    }
    public function getRating() {
        return $this->RATING;
    }

    public function getComment() {
        return $this->COMMENT;
    }

    public function getCreatedAt() {
        return $this->CREATED_AT;
    }
}

class user {
    private $USER_ID;
    private $USERNAME;
    private $PASSWORD;
    private $EMAIL;
    private $CARD_NUMBER;
    private $EXPIRATION_DATE;

    public function __construct($USER_ID, $USERNAME, $PASSWORD, $EMAIL, $CARD_NUMBER, $EXPIRATION_DATE) {
        $this->USER_ID = $USER_ID;
        $this->USERNAME = $USERNAME;
        $this->PASSWORD = password_hash($PASSWORD, PASSWORD_DEFAULT); // Hash the password
        $this->EMAIL = $EMAIL;
        $this->CARD_NUMBER = $CARD_NUMBER;
        $this->EXPIRATION_DATE = $EXPIRATION_DATE;
    }
    public function getUserId() {
        return $this->USER_ID;
    }
    public function getUsername() {
        return $this->USERNAME;
    }
    public function getPassword() {
        return $this->PASSWORD;
    }
    public function getEmail() {
        return $this->EMAIL;
    }
    public function getCardNumber() {
        return $this->CARD_NUMBER;
    }
    public function getExpirationDate() {
        return $this->EXPIRATION_DATE;
    }

    public static function getUserById($USER_ID) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE USER_ID = ?");
        $stmt->execute([$USER_ID]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null; // User not found
        }
        return new user(
            $row['USER_ID'],
            $row['USERNAME'],
            $row['PASSWORD'],
            $row['EMAIL'],
            $row['CARD_NUMBER'],
            $row['EXPIRATION_DATE']
        );
    }
    public static function getUserByUsername($username) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE USERNAME = :USERNAME");
        $stmt->bindParam(':USERNAME', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return the user as an associative array
    }
}
?>