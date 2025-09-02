<?php

declare(strict_types=1);

namespace App\Challengers\ValidateCPFCNPJ;

use App\Interfaces\Contracts\DocumentInterface;

class ValidaCPFCNPJ implements DocumentInterface
{
    private string $value;
    private DigitCalculator $digitCalculator;
    private DocumentTypeDetector $typeDetector;

    public function __construct(string $value = '')
    {
        $this->value = $this->sanitizeValue($value);
        $this->digitCalculator = new DigitCalculator();
        $this->typeDetector = new DocumentTypeDetector();
    }

    public function isValid(string $document = ''): bool
    {
        if (!empty($document)) {
            $this->value = $this->sanitizeValue($document);
        }

        $type = $this->typeDetector->detectType($this->value);

        return match ($type) {
            'CPF' => $this->validateCpf() && $this->verifySequence(11),
            'CNPJ' => $this->validateCnpj() && $this->verifySequence(14),
            default => false
        };
    }

    public function format(string $document = ''): string|false
    {
        if (!empty($document)) {
            $this->value = $this->sanitizeValue($document);
        }

        $type = $this->typeDetector->detectType($this->value);

        return match ($type) {
            'CPF' => $this->formatCpf(),
            'CNPJ' => $this->formatCnpj(),
            default => false
        };
    }

    public function validateCpf(): bool
    {
        if (!$this->typeDetector->isCpf($this->value)) {
            return false;
        }

        $digits = substr($this->value, 0, 9);
        $newCpf = $this->digitCalculator->calculateDigits($digits);
        $newCpf = $this->digitCalculator->calculateDigits($newCpf, 11);

        return $newCpf === $this->value;
    }

    public function validateCnpj(): bool
    {
        if (!$this->typeDetector->isCnpj($this->value)) {
            return false;
        }

        $firstTwelveDigits = substr($this->value, 0, 12);
        $firstCalculation = $this->digitCalculator->calculateDigits($firstTwelveDigits, 5);
        $secondCalculation = $this->digitCalculator->calculateDigits($firstCalculation, 6);

        return $secondCalculation === $this->value;
    }

    public function formatCpf(): string|false
    {
        if (!$this->validateCpf()) {
            return false;
        }

        return sprintf(
            '%s.%s.%s-%s',
            substr($this->value, 0, 3),
            substr($this->value, 3, 3),
            substr($this->value, 6, 3),
            substr($this->value, 9, 2)
        );
    }

    public function formatCnpj(): string|false
    {
        if (!$this->validateCnpj()) {
            return false;
        }

        return sprintf(
            '%s.%s.%s/%s-%s',
            substr($this->value, 0, 2),
            substr($this->value, 2, 3),
            substr($this->value, 5, 3),
            substr($this->value, 8, 4),
            substr($this->value, 12, 2)
        );
    }

    private function sanitizeValue(string $value): string
    {
        return (string) preg_replace('/[^0-9]/', '', $value);
    }

    private function verifySequence(int $length): bool
    {
        for ($i = 0; $i < 10; $i++) {
            if (str_repeat((string) $i, $length) === $this->value) {
                return false;
            }
        }

        return true;
    }

    public function valida(string $document = ''): bool
    {
        return $this->isValid($document);
    }

    public function formata(string $document = ''): string|false
    {
        return $this->format($document);
    }
}
