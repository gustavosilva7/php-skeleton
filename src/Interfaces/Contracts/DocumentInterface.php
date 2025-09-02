<?php

declare(strict_types=1);

namespace App\Interfaces\Contracts;

interface DocumentInterface
{
    public function isValid(string $document): bool;

    public function format(string $document): string|false;
}
