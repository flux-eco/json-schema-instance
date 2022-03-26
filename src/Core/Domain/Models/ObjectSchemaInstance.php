<?php

namespace FluxEco\JsonSchemaInstance\Core\Domain\Models;

class ObjectSchemaInstance implements SchemaInstance
{
    private ObjectSchemaInstanceProperties $value;
    private ?string $describedBy = null;

    private function __construct(ObjectSchemaInstanceProperties $properties, ?string $describedBy = null)
    {
        $this->value = $properties;
        if ($describedBy !== null) {
            $this->describedBy = $describedBy;
        }
    }

    public static function new(ObjectSchemaInstanceProperties $properties, ?string $describedBy = null): self
    {
        return new self($properties, $describedBy);
    }


    final  public function getValue(): ObjectSchemaInstanceProperties
    {
        return $this->value;
    }

    public function toArray(): array
    {
        $array =  $this->value->toArray();
        $array['describedBy'] = $this->describedBy;
        return $array;
    }

    final public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    final public function getDescribedBy(): ?string
    {
        return $this->describedBy;
    }

    final public function equals(\JsonSerializable $other): bool
    {
        return (json_encode($this, JSON_THROW_ON_ERROR) === json_encode($other, JSON_THROW_ON_ERROR));
    }
}