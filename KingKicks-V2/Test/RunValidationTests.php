<?php
require_once 'C:\laragon\www\KingKicks\classes.php'; // Include the file where your classes are defined

echo "<h1>Interactive Validation Tests</h1>";

/**
 * Helper function to display the result of a test.
 */
function displayResult($testName, $callback) {
    try {
        $callback();
        echo "<p style='color: green;'>✔️ $testName passed.</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ $testName failed: " . $e->getMessage() . "</p>";
    }
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $testType = $_POST['test_type'];

    switch ($testType) {
        case 'price':
            $price = $_POST['price'];
            displayResult("Product price validation", function() use ($price) {
                $product = new products(1, "Nike Air Max", $price, "Nike", 50, "airmax.jpg");
            });
            break;

        case 'stock':
            $stock = $_POST['stock'];
            displayResult("Product stock validation", function() use ($stock) {
                $product = new products(1, "Nike Air Max", 120, "Nike", $stock, "airmax.jpg");
            });
            break;

        case 'rating':
            $rating = $_POST['rating'];
            displayResult("Review rating validation", function() use ($rating) {
                Review::addReview(1, $rating, "Great product!");
            });
            break;

        case 'name':
            $name = $_POST['name'];
            displayResult("Product name validation", function() use ($name) {
                $product = new products(1, $name, 120, "Nike", 50, "airmax.jpg");
            });
            break;

        case 'comment':
            $comment = $_POST['comment'];
            displayResult("Review comment length validation", function() use ($comment) {
                Review::addReview(1, 5, $comment);
            });
            break;

        default:
            echo "<p style='color: red;'>Invalid test type selected.</p>";
    }
}
?>

<!-- HTML Form for Interactive Testing -->
<form method="POST">
    <h2>Select a Test</h2>

    <!-- Test for Product Price -->
    <label>
        <input type="radio" name="test_type" value="price" required>
        Test Product Price (Enter a price)
    </label>
    <input type="number" name="price" placeholder="Enter price"><br><br>

    <!-- Test for Product Stock -->
    <label>
        <input type="radio" name="test_type" value="stock" required>
        Test Product Stock (Enter stock quantity)
    </label>
    <input type="number" name="stock" placeholder="Enter stock"><br><br>

    <!-- Test for Review Rating -->
    <label>
        <input type="radio" name="test_type" value="rating" required>
        Test Review Rating (Enter a rating between 1 and 5)
    </label>
    <input type="number" name="rating" min="1" max="5" placeholder="Enter rating"><br><br>

    <!-- Test for Product Name -->
    <label>
        <input type="radio" name="test_type" value="name" required>
        Test Product Name (Enter a product name)
    </label>
    <input type="text" name="name" placeholder="Enter product name"><br><br>

    <!-- Test for Review Comment -->
    <label>
        <input type="radio" name="test_type" value="comment" required>
        Test Review Comment (Enter a comment)
    </label>
    <textarea name="comment" rows="4" cols="50" placeholder="Enter comment"></textarea><br><br>

    <button type="submit">Run Test</button>
</form>