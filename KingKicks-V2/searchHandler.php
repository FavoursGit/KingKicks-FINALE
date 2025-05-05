<?php
require_once 'classes.php'; // Include the file where your classes are defined

// Get the search query
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($query)) {
    echo '';
    exit();
}

// Fetch matching shoes using the Shoe class
$results = Shoe::searchShoes($query);

// Generate HTML for the results
if (empty($results)) {
    echo '<p>No results found.</p>';
} else {
    foreach ($results as $shoe) {
        echo '<div class="search-result-item">';
        echo '<a href="shoe.php?id=' . htmlspecialchars($shoe->getProductId()) . '">';
        echo '<img src="images/' . htmlspecialchars($shoe->getImage()) . '" alt="' . htmlspecialchars($shoe->getProductName()) . '" width="50" height="50">';
        echo '<span>' . htmlspecialchars($shoe->getProductName()) . ' - €' . htmlspecialchars($shoe->getPrice()) . '</span>';
        echo '</a>';
        echo '</div>';
    }
}
?>