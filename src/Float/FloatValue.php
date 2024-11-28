<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Types\Float;

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
     * Sums the provided float to the current float and returns the new one.
     * 
     * @return FloatValue
     */
    public function sum(FloatValue $float): FloatValue
    {
        return new FloatValue($this->value + $float->value);
    }

    /**
     * Subtracts the provided float from the current float and returns the new one.
     * 
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
     */
    public function multiply(FloatValue $float): FloatValue
    {
        return new FloatValue($this->value * $float->value);
    }

    /**
     * Divides the current float by the provided float and returns the new one.
     * 
     * @return FloatValue
     */
    public function divide(FloatValue $float): FloatValue
    {
        return new FloatValue($this->value / $float->value);
    }
}