<?php
use PHPUnit\Framework\TestCase;

require_once 'C:\laragon\www\KingKicks\classes.php'; // Include the file where your classes are defined

class ShoeTest extends TestCase {
    public function testShoeInitialization() {
        // Arrange: Create a Shoe object
        $sizes = [
            ['SIZE' => 8, 'stock' => 10],
            ['SIZE' => 9, 'stock' => 5]
        ];
        $shoe = new Shoe(1, "Nike Air Max", 120, "Nike", 50, "nike_air_max.jpg", $sizes);

        // Assert: Check if the Shoe object is initialized correctly
        $this->assertEquals(1, $shoe->getProductId());
        $this->assertEquals("Nike Air Max", $shoe->getProductName());
        $this->assertEquals(120, $shoe->getPrice());
        $this->assertEquals("Nike", $shoe->getBrand());
        $this->assertEquals(50, $shoe->getStock());
        $this->assertEquals("nike_air_max.jpg", $shoe->getImage());
        $this->assertEquals($sizes, $shoe->getSize());
    }
}