<?php

namespace sixlive\Laravel\JsonSchemaAssertions;

use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\InvalidValue;
use PHPUnit\Framework\Assert as PHPUnit;

class SchemaAssertion
{
    protected $schema;

    public function __construct(string $schema)
    {
        $this->schema = Schema::import(json_decode($schema));
    }

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
