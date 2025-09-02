<?php

declare(strict_types=1);

namespace App\Challengers\ValidateCPFCNPJ;

class DocumentTypeDetector
{
    public function detectType(string $value): string|false
    {
        $length = strlen($value);

        return match ($length) {
            11 => 'CPF',
            14 => 'CNPJ',
            default => false
        };
    }

    public function isCpf(string $value): bool
    {
        return strlen($value) === 11;
    }

    public function isCnpj(string $value): bool
    {
        return strlen($value) === 14;
    }
}
