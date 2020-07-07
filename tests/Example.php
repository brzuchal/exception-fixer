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
}
