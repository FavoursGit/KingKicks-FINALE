<?php
use PHPUnit\Framework\TestCase;

require_once 'C:\laragon\www\KingKicks\classes.php'; // Include the file where your classes are defined

class TestAddProduct extends TestCase {
    public function testAddProductToCart() {
        // Arrange: Create a Cart object and a Product object
        $cart = new Cart();
        $product = new products(1, "Nike Air Max", 120, "Nike", 50, "airmax.jpg");

        // Act: Add the product to the cart
        $cart->addProduct($product, "10", 2);

        // Assert: Check if the product was added correctly
        $items = $cart->getItems();
        $this->assertCount(1, $items);
        $this->assertEquals(240, $cart->getTotalPrice()); // 120 * 2
    }
}