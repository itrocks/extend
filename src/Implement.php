<?php
namespace ITRocks\Extend;

use Attribute;

/**
 * Declares which interface this trait aims to implement.
 */
#[Attribute(Attribute::IS_REPEATABLE, Attribute::TARGET_CLASS)]
class Implement
{

	//----------------------------------------------------------------------------------- $implements
	/** @var class-string[] */
	public array $implements;

	//----------------------------------------------------------------------------------- __construct
	/** @param $implements class-string[] */
	public function __construct(string ...$implements)
	{
		$this->implements = $implements;
	}

	//------------------------------------------------------------------------------------ __toString
	public function __toString() : string
	{
		return join(', ', $this->implements);
	}

}
