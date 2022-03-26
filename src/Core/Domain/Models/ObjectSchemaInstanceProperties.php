<?php

namespace FluxEco\JsonSchemaInstance\Core\Domain\Models;

class ObjectSchemaInstanceProperties implements \ArrayAccess, \IteratorAggregate {

    /** @var SchemaInstance[] */
    private array $properties = [];


    private function __construct() {

    }

    public static function new(): self {
        return new self();
    }

    public function toArray(): array {
        $array = [];
        foreach($this->properties as $key => $property) {
            $array[$key] = $property->toArray();
        }
        return $array;
    }

    final public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->properties);
    }

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->properties);
    }

    public function offsetGet(mixed $offset): SchemaInstance
    {
        return $this->properties[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value)
    {
        $this->properties[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        reset($this->properties[$offset]);
    }
}