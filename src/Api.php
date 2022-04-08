<?php

namespace FluxEco\JsonSchemaInstance;

class Api
{

    private Core\Ports\SchemaInstanceService $service;

    private function __construct(Core\Ports\SchemaInstanceService $service)
    {
        $this->service = $service;
    }

    public static function new() : self
    {
        $service = Core\Ports\SchemaInstanceService::new();
        return new self($service);
    }

    final public function getSchemaInstance(string $value, array $jsonSchema) : array
    {
        $schemaInstance = $this->service->getSchemaInstance($value, $jsonSchema);
        return SchemaInstance::fromDomain($schemaInstance)->toArray();
    }
}