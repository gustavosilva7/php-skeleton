<?php

declare(strict_types=1);

use App\Challengers\ChallengeOne;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ChallengeOneTest extends TestCase
{
    private ChallengeOne $challengeOne;

    protected function setUp(): void
    {
        $this->challengeOne = new ChallengeOne();
    }

    public static function calcCases(): array
    {
        return [
            'Divisível por 3' => [3, "Gustavo"],
            'Divisível por 5' => [10, "Alexandre"],
            'Divisível por 3 e 5' => [15, "Gustavo Alexandre"],
            'Não divisível por 3 e 5' => [4, "4"],
        ];
    }

    #[DataProvider('calcCases')]
    public function testCalc(int $input, string $expected): void
    {
        $this->assertSame($expected, $this->challengeOne->calc($input));
    }
}
