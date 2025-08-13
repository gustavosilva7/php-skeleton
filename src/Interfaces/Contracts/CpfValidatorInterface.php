<?php

declare(strict_types=1);

namespace App\Interfaces\Contracts;

interface CpfValidatorInterface extends DocumentValidatorInterface
{
    public function validateCpf(): bool;

    public function formatCpf(): string|false;
}
