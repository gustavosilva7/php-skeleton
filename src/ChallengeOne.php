<?php

declare(strict_types=1);

namespace App;

class ChallengeOne
{
    public function calc(int $value = 0): string
    {
        if ($value % 3 === 0 && $value % 5 !== 0) {
            return "Gustavo";
        } elseif ($value % 5 === 0 && $value % 3 !== 0) {
            return "Alexandre";
        } elseif ($value % 3 === 0 && $value % 5 === 0) {
            return "Gustavo Alexandre";
        } else {
            return (string) $value;
        }

        return '';
    }
}
