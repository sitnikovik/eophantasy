<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Type\Float;

use DivisionByZeroError;

/**
 * A class representing a float.
 * 
 * This class is immutable, meaning that its value cannot be changed after it is created.
 */
class FloatValue
{
    /**
     * The stored value.
     * 
     * @var float
     */
    private $value;

    /**
     * Creates a new Float instance.
     * 
     * @param float $value The float value.
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * Returns the float value.
     * 
     * @return float
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * Sums the provided float to the current float and returns the new one.
     * 
     * @param FloatValue $float The float to sum.
     * @return FloatValue
     */
    public function sum(FloatValue $float): FloatValue
    {
        return new FloatValue($this->value + $float->value);
    }

    /**
     * Subtracts the provided float from the current float and returns the new one.
     * 
     * @param FloatValue $float The float to subtract.
     * @return FloatValue
     */
    public function subtract(FloatValue $float): FloatValue
    {
        return new FloatValue($this->value - $float->value);
    }

    /**
     * Multiplies the provided float by the current float and returns the new one.
     * 
     * @return FloatValue
     * @return FloatValue
     */
    public function multiply(FloatValue $float): FloatValue
    {
        return new FloatValue($this->value * $float->value);
    }

    /**
     * Divides the current float by the provided float and returns the new one.
     * 
     * @return FloatValue
     * @return FloatValue
     * @throws DivisionByZeroError
     */
    public function divide(FloatValue $float): FloatValue
    {
        if ($float->value === 0) {
            throw new DivisionByZeroError();
        }

        return new FloatValue($this->value / $float->value);
    }

    /**
     * Defines if the current float is empty.
     * 
     * @return bool
     */
    public function empty(): bool
    {
        return $this->value === 0.0;
    }

    /**
     * Defines if the current float equals to the provided float.
     * 
     * @param FloatValue $float The float to compare.
     * @return bool
     */
    public function equals(FloatValue $float): bool
    {
        return $this->value === $float->value;
    }

    /**
     * Defines if the current float is greater than the provided float.
     * 
     * @param FloatValue $float The float to compare.
     * @return bool
     */
    public function greaterThan(FloatValue $float): bool
    {
        return $this->value > $float->value;
    }

    /**
     * Defines if the current float is greater than or equals to the provided float.
     * 
     * @param FloatValue $float The float to compare.
     * @return bool
     */
    public function greaterThanOrEquals(FloatValue $float): bool
    {
        return $this->value >= $float->value;
    }

    /**
     * Defines if the current float is less than the provided float.
     * 
     * @param FloatValue $float The float to compare.
     * @return bool
     */
    public function lessThan(FloatValue $float): bool
    {
        return $this->value < $float->value;
    }

    /**
     * Defines if the current float is less than or equals to the provided float.
     * 
     * @param FloatValue $float The float to compare.
     * @return bool
     */
    public function lessThanOrEquals(FloatValue $float): bool
    {
        return $this->value <= $float->value;
    }
}
