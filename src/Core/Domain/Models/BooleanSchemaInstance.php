<?php

namespace FluxEco\JsonSchemaInstance\Core\Domain\Models;


class BooleanSchemaInstance implements SchemaInstance
{
    private bool $value;
    private ?string $describedBy = null;

    private function __construct(bool $value, ?string $schemaLink = null)
    {
        $this->value = $value;
        if ($schemaLink !== null) {
            $this->describedBy = $schemaLink;
        }
    }

    public static function new(string $value, ?string $schemaLink = null): self
    {
        return new self($value, $schemaLink);
    }

    final public function getValue(): bool
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'describedBy' => $this->describedBy
        ];
    }

    final public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    final public function getDescribedBy(): ?string
    {
        return $this->describedBy;
    }

    public function equals(StringSchemaInstance|\JsonSerializable $other): bool
    {
        return ($this->getValue() === $other->getValue());
    }
}
