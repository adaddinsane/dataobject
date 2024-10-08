Data Object
===========
This package provides two extendable classes for accessing the contents of a
data array through various default and custom methods.

Why would you do this? The main reason is that simply passing arrays gives you
no validation of _what_ is being passed, but an array as an object can be
type-hinted so provide better certainty of correct code.

All classes are abstract (which is ignored in the examples below) and must be
extended in order to be used.

Options
-------
One class allows the data to be written, while the other provides an immutable
object which has no `set()` method.

```php
$data = [
  'a' => 'A',
  'b' => 'B'
];

$object = new DataObject($data);

$a = $object->get('a');
$b = $object->get('b', 'z'); // Default value 'z', if 'b' key is not set.

$data->set('b', 'q');

$immutable = new ImmutableDataObject($data);

$immutable->set('b', 'q'); // Method not permitted.
```

This package can be used in conjunction with the ParamVerify package that can
check the contents of an array before creating the data object.

How to use
----------
You could just use these classes as they stand but that's not the best way.

Let's say you fetch data from an API in the form of an array, we'll call it
personData. To use the DataObject with that you'd create a new class:

```php
class PersonData extends \Adaddinsane\DataObject\ImmutableDataObject {

    public function getFullName(): string {
        return $this->get('given_name') . ' ' . $this->get('family_name');
    }
}
```
You can create methods to extract precisely the data you need.

And if the API data structure changes, you just change the class to match. If
you use `getFullName()` in multiple places, you only need to change it once.

You can now type-hint in arguments to ensure you're delivering the right item.
```php
function analyse(PersonData $person) { ... }
```

GenericBag
----------
This is a third abstract object which extends a DataObject to allow the items
being added to be verified as being of a specific class type or types.

The verification function can also be overridden if something other than
classes are being stored.

The point of a Bag is that you can have a collection of items which can be
passed around together, and can be type-hinted to ensure the right items are
being delivered.

### Merge
In your GenericBag class, implement the `GenericBagMergeInterface` class and
`trait GenericBagMergeTrait;` you then have access to a merge() method which
takes another GenericBag object as a parameter.

### Filter
In your GenericBag class, implement the `GenericBagFilterInterface` class and
`trait GenericBagFilterTrait;` you then have access to a filter() method which
takes a filter callable.

The filter callable is used in an `array_filter()` command on the GenericBag's
data  to extract a subset of items which is then used to create and return a
new GenericBag of the same class.

### Sort
In your GenericBag class, implement the `GenericBagSortInterface` class and
`trait GenericBagSortTrait;` you then have access to a sort() method which
takes a sort callable.

The sort callable is used in an `uasort()` command on the GenericBag's
data which sorts the items of this GenericBag. No value is returned.

Other forms of access
---------------------
The DataObjects also implement the ArrayIterator and Count interfaces, which
means that if you want to you can use the object in a loop or count the values.