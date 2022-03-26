<?php


namespace FluxEco\JsonSchemaInstance\Core\Domain\Models;
use FluxEco\JsonSchemaInstance\Core\Ports;

interface SchemaInstance extends \JsonSerializable {
    public function toArray(): array;
    public function equals(\JsonSerializable $other): bool;
}