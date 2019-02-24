<?php

namespace sixlive\Laravel\JsonSchemaAssertions;

use Illuminate\Foundation\Testing\TestResponse;
use sixlive\JsonSchemaAssertions\SchemaAssertion;
use Illuminate\Support\ServiceProvider as Provider;
use Illuminate\Support\Facades\Config;

class ServiceProvider extends Provider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('json-schema-assertions.php'),
            ], 'config');
        }

        TestResponse::macro('assertJsonSchema', function ($schema) {
            $basePath = Config::get('json-schema-assertions.schema_base_path');

            (new SchemaAssertion($basePath))
              ->schema($schema)
              ->assert($this->content());

            return $this;
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'json-schema-assertions');
    }
}
