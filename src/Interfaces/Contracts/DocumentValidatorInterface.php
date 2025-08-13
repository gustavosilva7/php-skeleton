<?php

declare(strict_types=1);

namespace App\Interfaces\Contracts;

interface DocumentValidatorInterface
{
    public function validate(): bool;

    public function format(): string|false;

    public function getValue(): string;

    public function isValid(): bool;
}
