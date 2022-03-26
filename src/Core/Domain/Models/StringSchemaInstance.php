<?php

namespace FluxEco\JsonSchemaInstance\Core\Domain\Models;


class StringSchemaInstance implements SchemaInstance
{
    private string $value;
    private ?string $describedBy = null;

    private function __construct(string $value, ?string $describedBy = null)
    {
        $this->value = $value;
        if ($describedBy !== null) {
            $this->describedBy = $describedBy;
        }
    }

    public static function new(string $value, ?string $describedBy = null): self
    {
        return new self($value, $describedBy);
    }


    final public function getValue(): string
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
