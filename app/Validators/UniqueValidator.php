<?php

declare(strict_types=1);

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class UniqueValidator extends AbstractValidator
{

    protected string $message = 'Field :field must be unique';

    public function rule(): bool
    {
        return !Capsule::table($this->args[0])
            ->where($this->args[1], $this->value)->count();
    }
}
