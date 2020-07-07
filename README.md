# ExceptionTraceFixer

This library provides a trait which allows to create new instances of using class while
fixing exception information like file, line and trace. 

## Installation

Use [Composer] to install the package:

```
$ composer require brzuchal/exception-fixer
```

## Example

```php
use Brzuchal\ExceptionFixer\ExceptionTraceFixer;

class ExampleException extends Exception
{
    use ExceptionTraceFixer;

    public static function fail(Command $command): self
    {
        return self::new(\sprintf(
            'This is a custom exception caused by %s',
            \get_class($command)
        ));
    }
}
```

## Contribute

Contributions to the package are always welcome!

* Report any bugs or issues you find on the [issue tracker].
* You can grab the source code at the package's [Git repository].

## License

All contents of this package are licensed under the [MIT license].
