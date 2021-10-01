<?php

namespace Adaddinsane\DataObject;

interface ImmutableDataObjectInterface extends  \IteratorAggregate, \Countable
{

    /**
     * Does the property exist?
     *
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * Fetch the value of the named property, return default if missing.
     *
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null);

    /**
     * Fetch all the values.
     *
     * @return array
     */
    public function getAll(): array;

}