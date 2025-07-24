<?php

declare(strict_types=1);

use App\Challengers\ChallengeTwo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ChallengeTwoTest extends TestCase
{
    private ChallengeTwo $challengeTwo;

    protected function setUp(): void
    {
        $this->challengeTwo = new ChallengeTwo();
    }

    #[DataProvider('calcCases')]
    public function testCalc(int $input, string $expected): void
    {
        $this->assertSame($expected, $this->challengeTwo->calc($input));
    }

    public static function calcCases(): iterable
    {
        yield 'Divisível por 3' => [3, 'Gustavo'];
        yield 'Divisível por 5' => [10, 'Alexandre'];
        yield 'Divisível por 3 e 5' => [15, 'Gustavo Alexandre'];
        yield 'Não divisível por 3 e 5' => [4, '4'];
        yield 'Divisível por 7' => [21, 'Silva'];
    }
}
