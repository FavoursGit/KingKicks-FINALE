<?php
use PHPUnit\Framework\TestCase;

require_once 'classes.php'; // Include the file where the Product class is defined

class UnitTestProduct extends TestCase {
    public function testProductCreation() {
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

    public function testProductPriceUpdate() {
        // Arrange: Create a Product object
        $product = new Product(1, "Nike Air Max", 120, "Nike", 50, "airmax.jpg");

        // Act: Update the price
        $product->setPrice(150);

        // Assert: Check if the price was updated
        $this->assertEquals(150, $product->getPrice());
    }
}