<?php
namespace ITRocks;

use Attribute;

/**
 * - Declares multiple inheritance for the class.
 * - Declares which classes the trait is designed for.
 */
#[Attribute(Attribute::IS_REPEATABLE, Attribute::TARGET_CLASS)]
class Extend
{

	//-------------------------------------------------------------------------------------- $extends
	/** @var class-string[] */
	public array $extends;

	//----------------------------------------------------------------------------------- __construct
	/** @param $extends class-string[] */
	public function __construct(string ...$extends)
	{
		$this->extends = $extends;
	}

	//------------------------------------------------------------------------------------ __toString
	public function __toString() : string
	{
		return join(', ', $this->extends);
	}

}
