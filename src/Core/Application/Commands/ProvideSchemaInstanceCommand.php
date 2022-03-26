<?php


declare(strict_types=1);

namespace FluxEco\JsonSchemaInstance\Core\Application\Commands;


class ProvideSchemaInstanceCommand
{
    private string $value;
    private array $schema;
    private array $handlerMapping;

    private function __construct(string $value, array $schema, array $handlerMapping)
    {
        $this->value = $value;
        $this->schema = $schema;
        $this->handlerMapping = $handlerMapping;
    }

    public static function new(string $value, array $schema, array $handlerMapping): self
    {
        return new self($value, $schema, $handlerMapping);
    }

    final public function getValue(): string
    {
        return $this->value;
    }

    final public function getSchema(): array
    {
        return $this->schema;
    }

    final public function getHandlerMapping(): array
    {
        return $this->handlerMapping;
    }


}
