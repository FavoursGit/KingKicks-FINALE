<?php
use PHPUnit\Framework\TestCase;

require_once 'C:\laragon\www\KingKicks\classes.php'; // Include the file where your classes are defined

class TestReview extends TestCase {
    public function testReviewCreation() {
        // Arrange: Create a Review object
        $review = new Review(1, 1, 5, "Great product!", "2025-04-28");

        // Assert: Check if the properties are set correctly
        $this->assertEquals(1, $review->getReviewId());
        $this->assertEquals(1, $review->getProductId());
        $this->assertEquals(5, $review->getRating());
        $this->assertEquals("Great product!", $review->getComment());
        $this->assertEquals("2025-04-28", $review->getCreatedAt());
    }
}