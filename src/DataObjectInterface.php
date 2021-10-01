<?php

namespace Adaddinsane\DataObject;

interface DataObjectInterface extends ImmutableDataObjectInterface
{

    /**
     * Set the value for the named property.
     *
     * If `$mustExist` is set to true an exception will be thrown if the
     * property does not exist.
     *
     * @param string $key
     * @param mixed $value
     * @param bool $mustExist
     *
     * @return void
     *
     * @throws DataObjectException
     */
    public function set(string $key, $value, bool $mustExist = false): void;

    /**
     * Remove the named property from the data.
     *
     * If `$mustExist` is set to true an exception will be thrown if the
     * property does not exist.
     *
     * @param string $key
     * @param bool $mustExist
     *
     * @return void
     *
     * @throws DataObjectException
     */
    public function remove(string $key, bool $mustExist = false): void;

}