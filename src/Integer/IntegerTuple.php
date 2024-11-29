<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Types\Integer;

use Countable;
use Iterator;

/**
 * A class representing a list of integer values with integer indexes.
 * 
 * It is a tuple of integers with a fixed length, meaning that the number of values in the tuple is constant.
 * It is immutable, meaning that its value cannot be changed after it is created.
 * 
 * This class implements the Countable and Iterator interfaces 
 * to provide a way to work with the tj as with an array.
 */
class IntegerTuple implements Countable, Iterator
{
    /**
     * The stored items of the tuple as integer values only.
     * 
     * @param IntegerValue[] $items
     */
    private $items;

    /**
     * Creates a new IntegerTuple instance.
     * 
     * @param IntegerValue ...$values The integer values.
     */
    public function __construct(IntegerValue ...$values)
    {
        $this->items = $values;
    }

    /**
     * Checks if the tuple has the provided integer.
     * 
     * @param IntegerValue $integer The integer to check.
     * @return bool
     */
    public function has(IntegerValue $integer): bool
    {
        foreach ($this->items as $item) {
            if ($item->equals($integer)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Counts the number of items in the tuple.
     * 
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Returns the current item.
     * 
     * @return IntegerValue
     */
    public function current(): IntegerValue
    {
        return current($this->items);
    }

    /**
     * Returns the key of the current item.
     * 
     * @return int
     */
    public function key(): int
    {
        return key($this->items);
    }

    /**
     * Moves the internal pointer to the next item.
     * 
     * @return void
     */
    public function next(): void
    {
        next($this->items);
    }

    /**
     * Rewinds the internal pointer to the first item.
     * 
     * @return void
     */
    public function rewind(): void
    {
        reset($this->items);
    }

    /**
     * Checks if the current item is valid.
     * 
     * @return bool
     */
    public function valid(): bool
    {
        return key($this->items) !== null;
    }
}
