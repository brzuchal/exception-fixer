<?php declare(strict_types=1);

namespace Brzuchal\ExceptionFixer\Tests;

use Brzuchal\ExceptionFixer\ExceptionTraceFixer;
use Exception;

class ExampleException extends Exception
{
    use ExceptionTraceFixer;

    public static function create(): self
    {
        return self::new(...\func_get_args());
    }
}
