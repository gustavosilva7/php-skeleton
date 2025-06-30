<?php

use PHPUnit\Framework\TestCase;
use App\App;

class AppTest extends TestCase
{
    public function testHello()
    {
        $app = new App();
        $this->assertEquals('Hello, PHP Skeleton!', $app->hello());
    }

    public function testNotHello()
    {
        $app = new App();
        $this->assertNotEquals('Goodbye, PHP Skeleton!', $app->hello());
    }
}
