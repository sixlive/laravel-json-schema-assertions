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
     */
    public function __construct($schema)
    {
        if (is_array($schema)) {
            $schema = json_encode($schema);
        }

        if ($this->isJson($schema)) {
            $schema = json_decode($schema);
        }

        if ($this->isFileFromConfigPath($schema)) {
            $schema = $this->mergeConfigPath($schema);
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

    /**
     * Test if the schema is a JSON string.
     *
     * @param  mixed  $schema
     *
     * @return bool
     */
    private function isJson($schema)
    {
        return is_string($schema) && Str::isJson($schema);
    }

    /**
     * Test if the schema is being loaded from the config path.
     *
     * @param  mixed  $schema
     *
     * @return bool
     */
    private function isFileFromConfigPath($schema)
    {
        return is_string($schema)
            && file_exists($this->mergeConfigPath($schema));
    }

    /**
     * Merge the provided path with the config path and file extension.
     *
     * @param  string  $schema
     *
     * @return string
     */
    private function mergeConfigPath($schema)
    {
        return vsprintf('%s/%s.json', [
            config('json-schema-assertions.schema_base_path'),
            $schema,
        ]);
    }
}
