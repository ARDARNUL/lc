<?php

declare(strict_types=1);

namespace Validators;

use DateTime;
use Src\Validator\AbstractValidator;

class FutureDatetimeValidator extends AbstractValidator
{
    protected string $message = 'Field :field must be in the future';

    public function rule(): bool
    {
        if (!$this->value) {
            return false;
        }

        $now = date_create();

        $dt = new DateTime($this->value);

        return $dt >= $now;
    }
}