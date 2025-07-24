<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Interfaces\Contracts\CalcInterface;

class CalcThree implements CalcInterface
{
    private const MULTIPLE = 3;

    public function isMultiple(int $value): bool
    {
        return $value % self::MULTIPLE === 0;
    }

    public function getMessage(): string
    {
        return 'Gustavo';
    }
}
