<?php

namespace Adaddinsane\DataObject;

/**
 * Trait GenericBagSortTrait.
 */
trait GenericBagFilterTrait {

  /**
   * @inheritDoc
   *
   * @throws DataObjectException
   */
  public function filter(callable $filter): GenericBagInterface {
    /** @var GenericBagInterface $newCollection */
    $newCollection = new static();
    $newData = array_filter($this->data, $filter);

    /** @var object $item */
    foreach ($newData as $key => $item) {
      $newCollection->set($key, $item);
    }

    return $newCollection;
  }

}
