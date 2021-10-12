<?php

namespace Adaddinsane\DataObject;

/**
 * Abstract Class ImmutableDataObject.
 */
abstract class ImmutableDataObject implements ImmutableDataObjectInterface
{
    /**
     * The storage for the array being accessed.
     *
     * @var array
     */
    protected $data = [];

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
    public function get(string $key, $default = null)
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
    public function getIterator()
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