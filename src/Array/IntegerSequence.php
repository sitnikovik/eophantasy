<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Types\Array;

use Countable;
use Eophantasy\Types\Integer\IntegerValue;
use Iterator;

/**
 * A class representing a list of integer values with integer indexes.
 * 
 * This class implements the Countable and Iterator interfaces 
 * to provide a way to work with the sequence as with an array.
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
class IntegerSequence implements Countable, Iterator
{
    /**
     * The stored items of the sequence as integer values only.
     * 
     * @param IntegerValue[] $items
     */
    private $items;

    public function __construct(IntegerValue ...$integerValues)
    {
        $this->items = $integerValues;
    }

        /**
     * Counts the number of items in the sequence.
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
     * @return mixed
     */
    public function current(): mixed
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
