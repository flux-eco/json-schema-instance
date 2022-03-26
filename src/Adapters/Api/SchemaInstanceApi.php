<?php

namespace FluxEco\JsonSchemaInstance\Adapters\Api;

use FluxEco\JsonSchemaInstance\Core\Domain\Models\ArraySchemaInstance;
use FluxEco\JsonSchemaInstance\Core\Domain\Models\NumberSchemaInstance;
use FluxEco\JsonSchemaInstance\Core\Domain\Models\ObjectSchemaInstance;
use FluxEco\JsonSchemaInstance\Core\Ports;

class SchemaInstanceApi
{

    private Ports\SchemaInstanceService $service;

    private function __construct(Ports\SchemaInstanceService $service)
    {
        $this->service = $service;
    }

    public static function new(): self
    {
        $service = Ports\SchemaInstanceService::new();
        return new self($service);
    }

    final public function provideSchemaInstance(string $value, array $jsonSchema): array
    {
        $schemaInstance = $this->service->provideSchemaInstance($value, $jsonSchema);
        return SchemaInstance::fromDomain($schemaInstance)->toArray();
    }
}