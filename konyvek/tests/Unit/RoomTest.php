<?php

namespace Tests\Unit;

use App\Room;
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_has(): void
    {
        $people = new Room(['Dóra', "Alexa"]);
        $this->assertTrue($people->has('Dóra'));
    }
}
