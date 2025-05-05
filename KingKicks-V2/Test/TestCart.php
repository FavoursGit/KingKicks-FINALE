<?php
use PHPUnit\Framework\TestCase;

require_once 'C:\laragon\www\KingKicks\classes.php'; // Include the file where your classes are defined

class TestCart extends TestCase {
    public function testCartInitialization() {
        // Arrange: Create a Cart object
        $cart = new Cart();

        // Assert: Check if the cart is empty initially
        $this->assertEmpty($cart->getItems());
        $this->assertEquals(0, $cart->getTotalPrice());
    }
}