<?php

namespace Adaddinsane\DataObject;

/**
 * Abstract Class DataObject
 */
abstract class DataObject extends ImmutableDataObject implements DataObjectInterface
{

    /**
     * @inheritDoc
     */
    public function set(string $key, mixed $item, bool $mustExist = false): void
    {
        if ($mustExist && !$this->has($key)) {
            throw new DataObjectException(sprintf('Trying to set a property (%s) that does not exist.', $key));
        }

        $this->data[$key] = $item;
    }

    /**
     * @inheritDoc
     */
    public function remove(string $key, bool $mustExist = false): void
    {
        if ($mustExist && !$this->has($key)) {
            throw new DataObjectException(sprintf('Trying to remove a property (%s) that does not exist.', $key));
        }

        unset($this->data[$key]);
    }
}