<?php

declare(strict_types=1);

use App\ChallengeOne;
use PHPUnit\Framework\TestCase;

class ChallengeOneTest extends TestCase
{
    private ChallengeOne $challengeOne;

    protected function setUp(): void
    {
        $this->challengeOne = new ChallengeOne();
    }

    public function testCalcWithValueDivisibleByThree(): void
    {
        $result = $this->challengeOne->calc(3);

        $this->assertEquals("Gustavo", $result);
    }

    public function testCalcWithValueDivisibleByFive(): void
    {
        $result = $this->challengeOne->calc(10);

        $this->assertEquals("Alexandre", $result);
    }

    public function testCalcWithValueDivisibleByThreeAndFive(): void
    {
        $result = $this->challengeOne->calc(15);

        $this->assertEquals("Gustavo Alexandre", $result);
    }

    public function testCalcWithValueNotDivisibleByThreeAndFive(): void
    {
        $result = $this->challengeOne->calc(4);

        $this->assertEquals("4", $result);
    }
}
