<?php

namespace Nuwave\Lighthouse\Schema\Directives;

use Nuwave\Lighthouse\Support\Contracts\ArgTransformerDirective;

class BcryptDirective implements ArgTransformerDirective
{
    /**
     * Directive name.
     *
     * @return string
     */
    public function name(): string
    {
        return 'bcrypt';
    }

    public static function definition(): string
    {
        return 'directive @bcrypt on ARGUMENT_DEFINITION | INPUT_FIELD_DEFINITION';
    }

    /**
     * Run Laravel's bcrypt helper on the argument.
     *
     * Useful for hashing passwords before inserting them into the database.
     *
     * @param  string  $argumentValue
     * @return mixed
     */
    public function transform($argumentValue): string
    {
        return bcrypt($argumentValue);
    }
}
