<?php
use PHPUnit\Framework\TestCase;

require_once 'C:\laragon\www\KingKicks\classes.php'; // Include the file where your classes are defined

class TestRemoveProduct extends TestCase {
    public function testRemoveProductFromCart() {
        // Arrange: Create a Cart object and a Product object
        $cart = new Cart();
        $product = new products(1, "Nike Air Max", 120, "Nike", 50, "airmax.jpg");
        $cart->addProduct($product, "10", 2);

        // Act: Remove the product from the cart
        $cart->removeProduct(1, "10");

        // Assert: Check if the cart is empty after removal
        $this->assertEmpty($cart->getItems());
        $this->assertEquals(0, $cart->getTotalPrice());
    }
}