<?php declare(strict_types=1);

namespace Brzuchal\ExceptionFixer;

use Exception;
use ReflectionProperty;

trait ExceptionTraceFixer
{
    private static function new(...$args): self
    {
        static $prop;
        $exception = new self(...$args);
        if (!($exception instanceof Exception)) {
            return $exception;
        }
        if (empty($prop)) {
            $prop = new ReflectionProperty(Exception::class, 'trace');
        }
        $prop->setAccessible(true);
        foreach ($prop->getValue($exception) as $i => $frame) {
            if (!empty($frame['class']) && \is_a($frame['class'], self::class, true)) {
                $last = $frame;
                continue;
            }
            ['file' => $exception->file, 'line' => $exception->line] = $last;
            $prop->setValue($exception, \array_slice($prop->getValue($exception), $i));
            break;
        }
        $prop->setAccessible(false);

        return $exception;
    }
}
