<?php

declare(strict_types=1);

namespace App\Challengers;

use App\Interfaces\CalcThreeAndFive;
use App\Interfaces\CalcThree;
use App\Interfaces\CalcFive;
use App\Interfaces\CalcSeven;

class ChallengeTwo
{
    public function calc(int $value): string
    {
        $result = '';

        $calculators = [
            new CalcThreeAndFive(),
            new CalcSeven(),
            new CalcFive(),
            new CalcThree(),
        ];

        foreach ($calculators as $calculator) {
            if ($calculator->isMultiple($value)) {
                $result = $calculator->getMessage();

                break;
            }
        }

        return $result ?: (string) $value;
    }
}
