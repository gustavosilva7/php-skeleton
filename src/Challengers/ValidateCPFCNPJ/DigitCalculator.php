<?php

declare(strict_types=1);

namespace App\Challengers\ValidateCPFCNPJ;

use App\Interfaces\Contracts\DigitCalculatorInterface;

class DigitCalculator implements DigitCalculatorInterface
{
    public function calculateDigits(string $digits, int $positions = 10, int $sumDigits = 0): string
    {
        for ($i = 0; $i < strlen($digits); $i++) {
            $sumDigits += (int) $digits[$i] * $positions;
            $positions--;

            if ($positions < 2) {
                $positions = 9;
            }
        }

        $remainder = $sumDigits % 11;
        $checkDigit = $remainder < 2 ? 0 : 11 - $remainder;

        return $digits . $checkDigit;
    }
}
