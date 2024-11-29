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

use Countable;
use Iterator;

/**
 * A class representing a tuple of floats.
 * 
 * It is a sequence of floats with a fixed length, meaning that the number of floats in the tuple is constant.
 * It is immutable, meaning that its values cannot be changed after it is created.
 * 
 * This class implements the Countable and Iterator interfaces
 * to provide a way to work with the tuple as with an array.
 */
class FloatTuple implements Countable, Iterator
{
    /**
     * The stored values.
     * 
     * @var FloatValue[] $values
     */
    private $values;

    /**
     * Creates a new FloatTuple instance.
     * 
     * @param FloatValue ...$values The float values.
     */
    public function __construct(FloatValue ...$values)
    {
        $this->values = $values;
    }
    
       /**
     * Checks if the sequence has the provided float.
     * 
     * @param FloatValue $float The float to check.
     * @return bool
     */
    public function has(FloatValue $float): bool
    {
        foreach ($this->values as $item) {
            if ($item->equals($float)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns the number of values in the tuple.
     * 
     * @return int
     */
    public function count(): int
    {
        return count($this->values);
    }

    /**
     * Returns the current value.
     * 
     * @return FloatValue
     */
    public function current(): FloatValue
    {
        return current($this->values);
    }

    /**
     * Returns the current key.
     * 
     * @return int
     */
    public function key(): int
    {
        return key($this->values);
    }

    /**
     * Advances the internal pointer.
     * 
     * @return void
     */
    public function next(): void
    {
        next($this->values);
    }

    /**
     * Rewinds the internal pointer.
     * 
     * @return void
     */
    public function rewind(): void
    {
        reset($this->values);
    }

    /**
     * Checks if the current item is valid.
     * 
     * @return bool
     */
    public function valid(): bool
    {
        return key($this->values) !== null;
    }
}
