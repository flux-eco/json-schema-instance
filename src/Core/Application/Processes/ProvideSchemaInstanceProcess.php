<?php

namespace FluxEco\JsonSchemaInstance\Core\Application\Processes;

use FluxEco\JsonSchemaInstance\Core\{Application\Commands, Domain};


class ProvideSchemaInstanceProcess
{
    private function __construct()
    {

    }

    public static function new(): self
    {
        return new self();
    }

    public function process(Commands\ProvideSchemaInstanceCommand $command, Commands\ProvideSchemaInterfaceHandler $handler): Domain\Models\SchemaInstance
    {
        return $handler->handle($command);
    }
}