# Laravel JSON Schema Assertions

[![Packagist Version](https://img.shields.io/packagist/v/sixlive/laravel-json-schema-assertions.svg?style=flat-square)](https://packagist.org/packages/sixlive/laravel-json-schema-assertions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/sixlive/laravel-json-schema-assertions.svg?style=flat-square)](https://packagist.org/packages/sixlive/laravel-json-schema-assertions)
[![Travis](https://img.shields.io/travis/sixlive/laravel-json-schema-assertions.svg?style=flat-square)](https://travis-ci.org/sixlive/laravel-json-schema-assertions)
[![Code Quality](https://img.shields.io/scrutinizer/g/sixlive/laravel-json-schema-assertions.svg?style=flat-square)](https://scrutinizer-ci.com/g/sixlive/laravel-json-schema-assertions/)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/sixlive/laravel-json-schema-assertions.svg?style=flat-square)](https://scrutinizer-ci.com/g/sixlive/laravel-json-schema-assertions/)
[![StyleCI](https://github.styleci.io/repos/139347110/shield)](https://github.styleci.io/repos/139347110)

JSON Schema schema assertions for Laravel test responses. Uses [swaggest/php-json-schema](https://github.com/swaggest/php-json-schema) under the hood.

## Installation

You can install the package via composer:

```bash
> composer require sixlive/laravel-json-schema-assertions
```

## Usage

```php
/** @test */
public function it_has_a_valid_response()
{
    $schema = [
        'type' => 'object',
        'properties' => [
           'foo' => [
                'type' => 'string',
           ],
         ],
         'required' => [
            'foo',
        ],
    ];

    $response = $this->get('/foo');

    // Schema as an array
    $response->assertJsonSchema($schema);

    // Schema from a file
    $response->assertJsonSchema(base_path('schemas/foo.json'));
}
```

## Testing

``` bash
> composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Code Style
In addition to the php-cs-fixer rules, StyleCI will apply the [Laravel preset](https://docs.styleci.io/presets#laravel).

### Linting
```bash
> composer styles:lint
```

### Fixing
```bash
> composer styles:fix
```

## Security

If you discover any security related issues, please email oss@tjmiller.co instead of using the issue tracker.

## Credits

- [TJ Miller](https://github.com/sixlive)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
