<?php declare(strict_types=1);

namespace Brzuchal\ExceptionFixer\Tests;

use PHPUnit\Framework\TestCase;

class DerivedExceptionTraceFixerTest extends TestCase
{
    public function testFileAndLine(): void
    {
        ['file' => $file, 'line' => $line, 'exception' => $exception] = Example::test2('Foo', 999);
        $this->assertEquals($file, $exception->getFile());
        $this->assertEquals($line, $exception->getLine());
    }

    public function testTraceFileAndLine(): void
    {
        $traceFile = __FILE__; $traceLine = __LINE__; ['exception' => $exception] = Example::test2('Foo', 999);
        $this->assertEquals($traceFile, $exception->getTrace()[0]['file']);
        $this->assertEquals($traceLine, $exception->getTrace()[0]['line']);
    }

    public function testTraceAsString(): void
    {
        $traceFile = __FILE__; $traceLine = __LINE__; ['exception' => $exception] = Example::test2('Foo', 999);
        $traceString = $exception->getTraceAsString();
        $this->assertStringMatchesFormat(
            "#0 {$traceFile}({$traceLine}): Brzuchal\ExceptionFixer\Tests\Example::test2('Foo', 999)%a",
            $traceString
        );
    }

    public function testCastToString(): void
    {
        $traceFile = __FILE__; $traceLine = __LINE__; ['file' => $file, 'line' => $line, 'exception' => $exception] = Example::test2('Foo', 999);
        $exceptionString = (string) $exception;
        $this->assertStringMatchesFormat(
            "Brzuchal\ExceptionFixer\Tests\ExampleDerivedException: Foo in {$file}:{$line}
Stack trace:
#0 {$traceFile}({$traceLine}): Brzuchal\ExceptionFixer\Tests\Example::test2('Foo', 999)%a",
            $exceptionString
        );
    }
}
