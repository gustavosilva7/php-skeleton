<?php

declare(strict_types=1);

namespace App\Challengers;

class ChallengeOne
{
    public function calc(int $value): string
    {
        $result = '';

        if ($value % 3 === 0 && $value % 5 === 0) {
            $result = 'Gustavo Alexandre';
        } elseif ($value % 3 === 0) {
            $result = 'Gustavo';
        } elseif ($value % 5 === 0) {
            $result = 'Alexandre';
        } else {
            $result = (string) $value;
        }

        return $result;
    }
}
