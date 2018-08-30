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

This package uses Laravel's [package discovery](https://laravel.com/docs/5.6/packages#package-discovery) to register the service provider to the framework. If you are using an older version of Laravel or do not use package discovery see below.

<details>
    <summary>Provider registration</summary>

```php
// config/app.php

'providers' => [
    sixlive\Laravel\JsonSchemaAssertions\ServiceProvider::class,
]
```

</details>

### Configuration
Publish the packages config file:
```bash
> php artisan vendor:publish --provider="sixlive\Laravel\JsonSchemaAssertions\ServiceProvider" --tag="config"
```

This is the contents of the file which will be published at `config/json-schema-assertions`:
```php
return [
    'schema_base_path' => base_path('schemas'),
];
```

## Usage

If you are making use of external schema refrences e.g. `$ref: 'bar.json`, you must reference the schema through file path or using the config path resolution.

```
├── app
├── bootstrap
├── config
├── database
├── public
├── resources
├── routes
├── schemas
│   ├── bar.json
│   └── foo.json
├── storage
├── tests
└── vendor
```

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

    // Schema from raw JSON
    $response->assertJsonSchema(json_encode($schema));

    // Schema from a file
    $response->assertJsonSchema(base_path('schemas/foo.json'));

    // Schema from config path
    $response->assertJsonSchema('foo');

    // Remote schema
    $response->assertJsonSchema('https://docs.foo.io/schemas/foo.json');
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
