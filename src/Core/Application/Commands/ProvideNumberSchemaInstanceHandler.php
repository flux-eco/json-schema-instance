<?php

namespace FluxEco\JsonSchemaInstance\Core\Application\Commands;

use FluxEco\JsonSchemaInstance\Core\{Application, Domain};

class ProvideNumberSchemaInstanceHandler implements ProvideSchemaInterfaceHandler
{

    public function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    public function handle(ProvideSchemaInstanceCommand $command): Domain\Models\NumberSchemaInstance
    {
        $schema =  $command->getSchema();
        $value = $command->getValue();

        return Domain\Models\NumberSchemaInstance::new($value, json_encode($schema));
    }
}

