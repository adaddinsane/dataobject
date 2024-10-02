<?php

namespace Adaddinsane\DataObject;

/**
 * Abstract Class ImmutableDataObject.
 */
abstract class ImmutableDataObject implements ImmutableDataObjectInterface
{
    /**
     * The storage for the data belonging to this object.
     */
    protected array $data = [];

    /**
     * Constructor for ImmutableDataObject.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @inheritDoc
     */
    public function get(string $key, $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return \count($this->data);
    }
}