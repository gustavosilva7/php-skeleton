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

    public static function calcCases(): array
    {
        return [
            'Divisível por 3' => [
                3,
                [
                    [
                        'divisor' => 3,
                        'name' => 'Gustavo'
                    ]
                ],
                'Gustavo'
            ],

            'Divisível por 5' => [
                10,
                [
                    [
                        'divisor' => 5,
                        'name' => 'Alexandre'
                    ]
                ],
                'Alexandre'
            ],

            'Divisível por 3 e 5' => [
                15,
                [
                    [
                        'divisor' => 3,
                        'name' => 'Gustavo'
                    ],
                    [
                        'divisor' => 5,
                        'name' => 'Alexandre'
                    ]
                ],
                'Gustavo Alexandre'
            ],

            'Não divisível por 3 e 5' => [
                4,
                [
                    [
                        'divisor' => 3,
                        'name' => 'Gustavo'
                    ],
                    [
                        'divisor' => 5,
                        'name' => 'Alexandre'
                    ]
                ],
                '4'
            ],
        ];
    }

    #[DataProvider('calcCases')]
    public function testCalc(int $input, array $cases, string $expected): void
    {
        $this->assertSame($expected, $this->challengeTwo->calc($input, $cases));
    }

    #[DataProvider('calcCasesWithSevenValue')]
    public function testCalcWithSevenValue(int $input, array $cases, string $expected): void
    {
        $this->assertSame($expected, $this->challengeTwo->calc($input, $cases));
    }

    public static function calcCasesWithSevenValue(): iterable
    {
        yield 'Divisível por 7' => [
            21,
            [
                [
                    'divisor' => 7,
                    'name' => 'Silva'
                ]
            ],
            "Silva"
        ];
    }
}
