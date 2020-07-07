<?php declare(strict_types=1);

namespace Brzuchal\ExceptionFixer\Tests;

class ExampleDerivedException extends ExampleException
{
    public static function create2(): self
    {
        return self::new(...\func_get_args());
    }
}
