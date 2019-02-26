<?php

namespace Tests;

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\AssertionFailedError;

class AssertResponseTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();

        Route::get('foo', function () {
            return response()->json([
                'foo' => 'bar',
            ]);
        });
    }

    /** @test */
    public function valid_schema_passes_as_json()
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

        $this->get('foo')->assertJsonSchema(json_encode($schema));
    }

    /** @test */
    public function valid_schema_passes_as_array()
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

        $this->get('foo')->assertJsonSchema($schema);
    }

    /** @test */
    public function valid_schema_passes_as_file_path()
    {
        $this->get('foo')
             ->assertJsonSchema(__DIR__.'/Support/Schemas/foo.json');
    }

    /** @test */
    public function invalid_schema_fails_with_message()
    {
        $this->expectException(AssertionFailedError::class);

        $schema = [
             'type' => 'object',
             'properties' => [
               'foo' => [
                 'type' => 'integer',
               ],
             ],
             'required' => [
               'id',
             ],
       ];

        $this->get('foo')->assertJsonSchema(json_encode($schema));
    }

    /** @test */
    public function valid_schema_passes_as_config_path()
    {
        $this->get('foo')->assertJsonSchema('foo');
    }
}
