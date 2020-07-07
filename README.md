# ExceptionTraceFixer

This library provides a trait which allows to create new instances of using class while
fixing exception information like file, line and trace. 

## Installation

Use [Composer](https://getcomposer.org/) to install the package:

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

try {
    throw ExampleException::fail($command);
} catch (ExampleException $exception) {
    echo $exception->getFile(); 
    echo $exception->getLine();
    echo $exception->getTraceAsString();
    echo $exception;
    // above points to the place where the throw statement was executed
    // normally this would point to the place where ExampleException is created
    // we cut all trace information from ExampleException method calls on creation
}
```

## Contribute

Contributions to the package are always welcome!

* Report any bugs or issues you find on the [issue tracker](https://github.com/brzuchal/exception-fixer/issues).
* You can grab the source code at the package's [git repository](https://github.com/brzuchal/exception-fixer).

## License

All contents of this package are licensed under the [MIT license](LICENSE).
