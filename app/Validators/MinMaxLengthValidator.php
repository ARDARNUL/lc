<?php

declare(strict_types=1);

namespace Validators;

use Src\Validator\AbstractValidator;

class MinMaxLengthValidator extends AbstractValidator
{
    protected string $message = 'Field :field to short';

    public function rule(): bool
    {
        $count = strlen($this->value ?? "");
        $min = (int)($this->args[0] ?? 8);
        $max = (int)($this->args[1] ?? 255);

        return !($count < $min || $count > $max);
    }
}