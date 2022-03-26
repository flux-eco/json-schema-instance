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
        $value = $command->getValue();

        //ToDo special string validation
        //@see https://json-schema.org/draft/2020-12/json-schema-validation.html

        return Domain\Models\NumberSchemaInstance::new($value);
    }
}

