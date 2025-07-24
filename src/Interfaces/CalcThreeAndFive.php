<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Interfaces\Contracts\CalcInterface;

class CalcThreeAndFive implements CalcInterface
{
    public function isMultiple(int $value): bool
    {
        return $value % 3 === 0 && $value % 5 === 0;
    }

    public function getMessage(): string
    {
        return 'Gustavo Alexandre';
    }
}
