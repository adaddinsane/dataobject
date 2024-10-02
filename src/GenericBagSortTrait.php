<?php

namespace Adaddinsane\DataObject;

/**
 * Trait GenericBagSortTrait.
 */
trait GenericBagSortTrait {

  /**
   * @inheritDoc
   */
  public function sort(callable $sortBy): void {
    uasort($this->data, $sortBy);
  }

}
