<?php

namespace FluxEco\JsonSchemaInstance\Core\Domain\Models;


class NumberSchemaInstance implements SchemaInstance
{
    private int $value;
    private ?string $describedBy = null;

    private function __construct(int $value, ?string $describedBy = null)
    {
        $this->value = $value;
        if ($describedBy !== null) {
            $this->describedBy = $describedBy;
        }
    }

    public static function new(int $value, ?string $schemaLink = null): self
    {
        return new self($value, $schemaLink);
    }


    final public function getValue(): int
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

    public function equals(NumberSchemaInstance|\JsonSerializable $other): bool
    {
        return ($this->getValue() === $other->getValue());
    }
}
