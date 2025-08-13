<?php

declare(strict_types=1);

namespace App\Interfaces\Contracts;

interface DocumentTypeDetectorInterface
{
    public function detectType(string $value): string|false;

    public function isCpf(string $value): bool;

    public function isCnpj(string $value): bool;
}
