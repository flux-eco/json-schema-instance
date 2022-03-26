<?php

namespace FluxEco\JsonSchemaInstance\Core\Domain\Models;

class ArraySchemaInstance implements SchemaInstance
{
    private array $value;
    private ?string $describedBy = null;

    private function __construct(array $value, ?string $describedBy = null)
    {
        $this->value = $value;
        if ($describedBy !== null) {
            $this->describedBy = $describedBy;
        }
    }

    public static function new(array $value, ?string $describedBy = null): self
    {
        return new self($value, $describedBy);
    }

    final public function getValue(): array
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

    /**
     * @throws \JsonException
     */
    public function equals(ArraySchemaInstance|\JsonSerializable $other): bool
    {
        return (json_encode($this->getValue(), JSON_THROW_ON_ERROR) === json_encode($other->getValue(), JSON_THROW_ON_ERROR));
    }


}
