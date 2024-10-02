<?php

namespace Adaddinsane\DataObject;

/**
 * Interface GenericBagSortableInterface
 */
interface GenericBagMergeInterface {

  /**
   * Merge another bag into this one (with interface checks).
   *
   * @param GenericBagInterface $other
   *
   * @return void
   */
  public function merge(GenericBagInterface $other): void;

}
