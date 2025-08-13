<?php

declare(strict_types=1);

namespace App\Interfaces\Contracts;

interface CnpjValidatorInterface extends DocumentValidatorInterface
{
    public function validateCnpj(): bool;

    public function formatCnpj(): string|false;
}
