<?php

namespace FluxEco\JsonSchemaInstance;

class SchemaInstance
{
    private Core\Domain\Models\SchemaInstance $schemaInstance;

    private function __construct(Core\Domain\Models\SchemaInstance $schemaInstance)
    {
        $this->schemaInstance = $schemaInstance;
    }

    public static function fromDomain(Core\Domain\Models\SchemaInstance $schemaInstance) : self
    {
        return new self($schemaInstance);
    }

    public function toArray() : array
    {
        return $this->schemaInstance->toArray();
    }
}