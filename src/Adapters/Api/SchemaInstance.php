<?php

namespace FluxEco\JsonSchemaInstance\Adapters\Api;

use FluxEco\JsonSchemaInstance\Adapters;
use FluxEco\JsonSchemaInstance\Core\{Domain};

class SchemaInstance
{
    private  Domain\Models\SchemaInstance $schemaInstance;

    private function __construct(Domain\Models\SchemaInstance $schemaInstance)
    {
        $this->schemaInstance = $schemaInstance;
    }

    public static function fromDomain(Domain\Models\SchemaInstance $schemaInstance): self
    {
        return new self($schemaInstance);
    }

    public function toArray(): array {
       return $this->schemaInstance->toArray();
    }
}