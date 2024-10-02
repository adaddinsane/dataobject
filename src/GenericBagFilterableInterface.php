<?php

namespace Adaddinsane\DataObject;

/**
 * Interface GenericBagFilterInterface.
 *
 * Provides a filter interface for the contents of a GenericBag.
 */
interface GenericBagFilterableInterface {

  /**
   * Returns a new GenericBag containing the filtered items.
   *
   * @param callable $filter
   *
   * @return GenericBagInterface
   */
  public function filter(callable $filter): GenericBagInterface;

}
