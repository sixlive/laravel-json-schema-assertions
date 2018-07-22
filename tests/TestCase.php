<?php

namespace Tests;

use sixlive\Laravel\JsonSchemaAssertions\ServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set(
            'json-schema-assertions.schema_base_path',
            __DIR__.'/Support/Schemas'
        );
    }
}
