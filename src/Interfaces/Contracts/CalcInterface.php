<?php

declare(strict_types=1);

namespace App\Interfaces\Contracts;

interface CalcInterface
{
    public function isMultiple(int $value): bool;

    public function getMessage(): string;
}
