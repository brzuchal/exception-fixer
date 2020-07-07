<?php declare(strict_types=1);

namespace Brzuchal\ExceptionFixer\Tests;

class Example
{
    public static function test(): array
    {
        try {
            $file = __FILE__; $line = __LINE__; throw ExampleException::create(...\func_get_args());
        } catch (ExampleException $exception) {
            return ['file' => $file, 'line' => $line, 'exception' => $exception];
        }
    }

    public static function test2(): array
    {
        try {
            $file = __FILE__; $line = __LINE__; throw ExampleDerivedException::create2(...\func_get_args());
        } catch (ExampleDerivedException $exception) {
            return ['file' => $file, 'line' => $line, 'exception' => $exception];
        }
    }
}
