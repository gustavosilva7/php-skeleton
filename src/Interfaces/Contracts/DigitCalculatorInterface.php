<?php

declare(strict_types=1);

namespace App\Interfaces\Contracts;

interface DigitCalculatorInterface
{
    public function calculateDigits(string $digits, int $positions = 10, int $sumDigits = 0): string;
}
