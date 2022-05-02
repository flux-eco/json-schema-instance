<?php
/*
 * fluxcapacitor - microservice framework for business domains and business logic
 * Copyright (C) 2021 martin@fluxlabs.ch
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace FluxEco\JsonSchemaInstance\Core\Ports;

use FluxEco\JsonSchemaInstance\Core\{Domain, Application\Commands, Application\Processes};

class SchemaInstanceService
{
    /** @var Commands\ProvideSchemaInterfaceHandler[] */
    private array $handlerMapping;

    public function __construct(array $handlerMapping)
    {
        $this->handlerMapping = $handlerMapping;
    }

    public static function new() : self
    {
        $handlerMapping = [
            'boolean' => Commands\ProvideNumberSchemaInstanceHandler::new(),
            'number' => Commands\ProvideNumberSchemaInstanceHandler::new(),
            'integer' => Commands\ProvideNumberSchemaInstanceHandler::new(), //??
            'string' => Commands\ProvideStringSchemaInstanceHandler::new(),
            'object' => Commands\ProvideObjectSchemaInstanceHandler::new(),
            'array' => Commands\ProvideArraySchemaInstanceHandler::new(),
        ];
        return new self($handlerMapping);
    }

    final public function getSchemaInstance(
        string $value,
        array $schema
    ) : Domain\Models\ObjectSchemaInstance|Domain\Models\SchemaInstance {
        $process = Processes\ProvideSchemaInstanceProcess::new();
        $command = Commands\ProvideSchemaInstanceCommand::new($value, $schema, $this->handlerMapping);

        $type = $schema['type'];
        $handler = $this->handlerMapping[$type];

        return $process->process($command, $handler);
    }

}