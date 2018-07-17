<?php

namespace sixlive\Laravel\JsonSchemaAssertions;

use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\InvalidValue;
use PHPUnit\Framework\Assert as PHPUnit;
use sixlive\Laravel\JsonSchemaAssertions\Support\Str;

class SchemaAssertion
{
    protected $schema;

    /**
     * @param  array|string  $schema
     *
     * @return void
     */
    public function __construct($schema)
    {
        if (is_array($schema)) {
            $schema = json_encode($schema);
        }

        if (is_string($schema) && Str::isJson($schema)) {
            $schema = json_decode($schema);
        }

        $this->schema = Schema::import($schema);
    }

    /**
     * Assert JSON against the loaded schema.
     *
     * @param  string  $data
     *
     * @return void
     */
    public function assert(string $data)
    {
        try {
            $this->schema->in(json_decode($data));
        } catch (InvalidValue $e) {
            PHPUnit::fail($e->getMessage());
        }

        PHPUnit::assertTrue(true);
    }
}
