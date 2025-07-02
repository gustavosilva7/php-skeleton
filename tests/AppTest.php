<?php

declare(strict_types=1);

use App\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testHello(): void
    {
        $app = new App();
        $this->assertEquals('Hello, PHP Skeleton!', $app->hello());
    }

    public function testNotHello(): void
    {
        $app = new App();
        $this->assertNotEquals('Goodbye, PHP Skeleton!', $app->hello());
    }
}
