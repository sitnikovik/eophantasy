<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Type\Integer;

use DivisionByZeroError;

/**
 * A class representing an integer.
 * 
 * This class is immutable, meaning that its value cannot be changed after it is created.
 */
class IntegerValue
{
    /**
     * The stored value.
     * 
     * @var int
     */
    private $value;

    /**
     * Creates a new Integer instance.
     * 
     * @param int $value The integer value.
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * Returns the integer value.
     * 
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * Sums provided integer to the current integer and returns the new one.
     * 
     * @param IntegerValue $integer - The integer to sum.
     * @return IntegerValue - The new integer.
     */
    public function sum(IntegerValue $integer): IntegerValue
    {
        return new IntegerValue($this->value + $integer->value);
    }

    /**
     * Subtracts provided integer from the current integer and returns new one.
     * 
     * @param IntegerValue $integer The integer to subtract.
     * @return IntegerValue The new integer.
     */
    public function subtract(IntegerValue $integer): IntegerValue
    {
        return new IntegerValue($this->value - $integer->value);
    }

    /**
     * Multiplies provided integer to the current integer and returns the new one.
     * 
     * @param IntegerValue $integer The integer to multiply.
     * @return IntegerValue The new integer.
     */
    public function multiply(IntegerValue $integer): IntegerValue
    {
        return new IntegerValue($this->value * $integer->value);
    }

    /**
     * Divides provided integer from the current integer and returns the new one.
     * 
     * @param IntegerValue $integer The integer to divide.
     * @return IntegerValue The new integer.
     * @throws DivisionByZeroError
     */
    public function divide(IntegerValue $integer): IntegerValue
    {
        if ($integer->value === 0) {
            throw new DivisionByZeroError();
        }

        return new IntegerValue($this->value / $integer->value);
    }

    /**
     * Defines if the current integer is empty.
     * 
     * @return bool
     */
    public function empty(): bool
    {
        return $this->value === 0;
    }

    /**
     * Defines if the current integer equals to the provided integer.
     * 
     * @return bool
     */
    public function equals(IntegerValue $integer): bool
    {
        return $this->value === $integer->value;
    }

    /**
     * Defines if the current integer is greater than the provided integer.
     * 
     * @return bool
     */
    public function greaterThan(IntegerValue $integer): bool
    {
        return $this->value > $integer->value;
    }

    /**
     * Defines if the current integer is greater than or equals to the provided integer.
     * 
     * @return bool
     */
    public function greaterThanOrEquals(IntegerValue $integer): bool
    {
        return $this->value >= $integer->value;
    }

    /**
     * Defines if the current integer is less than the provided integer.
     * 
     * @return bool
     */
    public function lessThan(IntegerValue $integer): bool
    {
        return $this->value < $integer->value;
    }

    /**
     * Defines if the current integer is less than or equals to the provided integer.
     * 
     * @return bool
     */
    public function lessThanOrEquals(IntegerValue $integer): bool
    {
        return $this->value <= $integer->value;
    }
}