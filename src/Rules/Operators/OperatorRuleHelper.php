<?php declare(strict_types = 1);

namespace PHPStan\Rules\Operators;

use PHPStan\Type\FloatType;
use PHPStan\Type\IntegerType;
use PHPStan\Type\MixedType;
use PHPStan\Type\Type;
use PHPStan\Type\UnionType;

class OperatorRuleHelper
{

	public static function isValidForArithmeticOperation(Type $leftType, Type $rightType): bool
	{
		if ($leftType instanceof MixedType || $rightType instanceof MixedType) {
			return true;
		}

		$acceptedType = new UnionType([new IntegerType(), new FloatType()]);

		return $acceptedType->isSuperTypeOf($leftType)->yes() && $acceptedType->isSuperTypeOf($rightType)->yes();
	}

}
