it.rocks Extend
---------------

Hopelessly, PHP does not allow simple multiple inheritance.

Furthermore, there is no mechanism for declaring that a trait is designed to enhance a given class
(or some given classes). 

This little library adds a repetitive
[attribute](https://www.php.net/manual/en/language.attributes.overview) named `ITRocks\Extend`,
which allows to declare additional extends:
- to a class: you will be able to simulate some multi-inheritance mechanisms based on them,
- to an interface or trait: to reserve the implement/use of this to a given class,
- to a trait: tells that the trait is designed to be used in a class that inherits a class
  or a class using a given trait.

Another attribute, `ITRocks\Extend\Implement`, allows to declare that a trait is designed to
implement the methods prototyped into given interfaces.

Examples
--------

it.rocks widely use the `ITRocks\Extend` attribute to declare traits that are designed to extend
base classes at will, depending on your use case deployment configuration.

```php
use ITRocks\Extend;

class My_Expandable
{
	public string $a_property;
}

interface My_Interface
{
	public function getSomething() : string;
}

#[Extend(My_Expandable::class), Implement(My_Interface::class)]
trait My_Extension
{
	public string $additional_optional_property;
	public function getSomething() : string { return $this->additional_optional_property; }
}
```

Application example
-------------------

You may use the additional [itrocks/build](https://github.com/itrocks/build) library to apply these
inheritance mechanisms. 

With the previous example code and the following configuration :

```php
$configuration = [My_Expandable::class => [My_Extension::class]];
```

[itrocks/build](https://github.com/itrocks/build) will replace all instantiations of My_Expandable
into your source code by instantiations of the following built class:

```php
class My_Expandable\B extends My_Expandable implements My_Interface
{
  use My_Extension;
}
```

Refer to the documentation of [itrocks/build](https://github.com/itrocks/build) to see how.
