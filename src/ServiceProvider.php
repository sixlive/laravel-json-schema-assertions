<?php

namespace sixlive\Laravel\JsonSchemaAssertions;

use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        TestResponse::macro('assertMatchesJsonSchema', function ($schema) {
            (new SchemaAssertion($schema))->assert($this->content());
        });
    }
}
