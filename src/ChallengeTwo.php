<?php

declare(strict_types=1);

namespace App;

class ChallengeTwo
{
    public function calc(int $value, array $cases): string
    {
        $result = '';

        foreach ($cases as $case) {
            if ($value % $case['divisor'] === 0) {
                $result .= $case['name'] . ' ';
            }
        }

        if ($result === '') {
            return (string) $value;
        }

        return trim($result);
    }
}
