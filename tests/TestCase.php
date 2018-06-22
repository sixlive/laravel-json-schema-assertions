<?php

namespace Tests;

use sixlive\Laravel\JsonSchemaAssertions\ServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }
}
