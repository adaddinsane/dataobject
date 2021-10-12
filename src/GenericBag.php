<?php

namespace Adaddinsane\DataObject;

/**
 * Abstract Class GenericBag.
 */
abstract class GenericBag extends DataObject implements GenericBagInterface {

  /**
   * A list of the permitted classes that can be put in this bag.
   *
   * This value should be overridden in child classes.
   *
   * @var string[]
   */
  protected $permittedClasses = [];

  /**
   * @param array $items
   */
  public function __construct(array $items = []) {
    foreach ($items as $item) {
      if (!$this->verifyItem($item)) {
        throw new DataObjectException('Supplied item does not go in this bag.');
      }
    }

    parent::__construct($items);
  }

  /**
   * Checks the supplied item is an object and has the right class.
   *
   * Note: This method can be overridden to store something other than objects.
   *
   * @param mixed $item
   *
   * @return bool
   */
  protected function verifyItem($item): bool {
    if (!is_object($item)) {
      return FALSE;
    }
    if (empty($this->permittedClasses)) {
      return TRUE;
    }

    return in_array(get_class($item), $this->permittedClasses);
  }

  /**
   * @inheritDoc
   *
   * @throws DataObjectException
   */
  public function set(string $key, $item, bool $mustExist = FALSE): void {
    if (!$this->verifyItem($item)) {
      throw new DataObjectException('Supplied item does not go in this bag.');
    }

    parent::set($key, $item, $mustExist);
  }

}