<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Type\String;

/**
 * A class representing a string.
 * 
 * This class is immutable, meaning that its value cannot be changed after it is created.
 */
class StringValue
{
    /**
     * The stored value.
     * 
     * @var string
     */
    private $value;

    /**
     * Creates a new String instance.
     * 
     * @param string $value The string value.
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * Returns the string value.
     * 
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * Concatenates provided string to the current string and returns the new one.
     * 
     * @param StringValue $string The string to concatenate.
     * @return StringValue
     */
    public function concat(StringValue $string): StringValue
    {
        return new StringValue($this->value . $string->value);
    }

    /**
     * Checks if the current string is equal to the provided string.
     * 
     * @param StringValue $string The string to compare.
     * @return bool
     */
    public function equals(StringValue $string): bool
    {
        return $this->value === $string->value;
    }

    /**
     * Checks if the current string is empty.
     * 
     * @return bool
     */
    public function empty(): bool
    {
        return $this->value === '';
    }
}