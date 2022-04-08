<?php

namespace fluxJsonSchemaInstance;

use FluxEco\JsonSchemaInstance;

function getSchemaInstance(string $value, array $jsonSchema) : array
{
    return JsonSchemaInstance\Api::new()->getSchemaInstance($value, $jsonSchema);
}