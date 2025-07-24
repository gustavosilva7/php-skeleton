<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Interfaces\Contracts\CalcInterface;

class CalcFive implements CalcInterface
{
    private const MULTIPLE = 5;

    public function isMultiple(int $value): bool
    {
        return $value % self::MULTIPLE === 0;
    }

    public function getMessage(): string
    {
        return 'Alexandre';
    }
}
