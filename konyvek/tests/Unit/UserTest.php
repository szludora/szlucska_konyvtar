<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_name(): void
    {
        $name = "John";
        $name = "Jack";
        $this->assertTrue($name == "Jack");
    }
}
