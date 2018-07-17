<?php

namespace sixlive\Laravel\JsonSchemaAssertions;

use Swaggest\JsonSchema\Schema;
use Swaggest\JsonSchema\InvalidValue;
use PHPUnit\Framework\Assert as PHPUnit;

class SchemaAssertion
{
    protected $schema;

    public function __construct($schema)
    {
        if (is_array($schema)) {
            $schema = json_encode($schema);
        }

        if (is_string($schema) && $this->isJson($schema)) {
            $schema = json_decode($schema);
        }

        $this->schema = Schema::import($schema);
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

    public function isJson($schema)
    {
        json_decode($schema);

        return json_last_error() === JSON_ERROR_NONE;
    }
}
