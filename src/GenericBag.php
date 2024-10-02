<?php

namespace Adaddinsane\DataObject;

/**
 * Abstract Class GenericBag.
 */
abstract class GenericBag extends DataObject implements GenericBagInterface {

  /**
   * A list of the permitted classes that can be put in this bag.
   *
   * This value should be overridden in child classes. You can do things like:
   *
   * protected $permittedClasses = [
   *   MyClass::class,
   *   AnInterface::class
   * ];
   *
   * @var string[]
   */
  protected array $permittedClasses = [];

  /**
   * @param array $items
   *
   * @throws DataObjectException
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
  protected function verifyItem(mixed $item): bool {
    if (!is_object($item)) {
      return FALSE;
    }
    if (empty($this->permittedClasses)) {
      return TRUE;
    }

    // We check each permitted class individually.
    $isValid = false;
    foreach ($this->permittedClasses as $permittedClass) {
        if ($item instanceof $permittedClass) {
            $isValid = true;
            break;
        }
    }

    return $isValid;
  }

  /**
   * @inheritDoc
   *
   * @throws DataObjectException
   */
  public function set(string $key, mixed $item, bool $mustExist = FALSE): void {
    if (!$this->verifyItem($item)) {
      throw new DataObjectException('Supplied item does not go in this bag.');
    }

    parent::set($key, $item, $mustExist);
  }

}