<?php
use PHPUnit\Framework\TestCase;

require_once 'C:\laragon\www\KingKicks\classes.php'; // Include the file where your classes are defined

class TestProducts extends TestCase {
    public function  getReviewsByProductId() {
        // Arrange: Create a Product object
        $product = new products(1, "Nike Air Max", 120, "Nike", 50, "airmax.jpg");

        // Assert: Check if the properties are set correctly
        $this->assertEquals(1, $product->getProductId());
        $this->assertEquals("Nike Air Max", $product->getProductName());
        $this->assertEquals(120, $product->getPrice());
        $this->assertEquals("Nike", $product->getBrand());
        $this->assertEquals(50, $product->getStock());
        $this->assertEquals("airmax.jpg", $product->getImage());
    }
}