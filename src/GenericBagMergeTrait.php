<?php

namespace Adaddinsane\DataObject;

/**
 * Trait GenericBagMergeTrait.
 */
trait GenericBagMergeTrait {

  /**
   * @inheritDoc
   */
  public function merge(GenericBagInterface $other): void {
    /** @var object $object */
    foreach ($other as $key => $object) {
      if (!$this->has($key)) {
        $this->set($key, $object);
      }
    }
  }

}
