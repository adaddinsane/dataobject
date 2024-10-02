<?php

namespace Adaddinsane\DataObject;

/**
 * Interface GenericBagSortableInterface
 */
interface GenericBagSortableInterface {

  /**
   * Default method for sorting objects in a generic bag according to the supplied comparison.
   *
   * The current bag order is modified.
   *
   * @param callable $sortBy
   *
   * @return void
   */
  public function sort(callable $sortBy): void;

}
