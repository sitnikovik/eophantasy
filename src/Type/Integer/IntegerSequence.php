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

use Countable;
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

    /**
     * Creates a new IntegerSequence instance.
     * 
     * @param IntegerValue ...$integerValues The integer values.
     */
    public function __construct(IntegerValue ...$integerValues)
    {
        $this->items = $integerValues;
    }

        /**
     * Adds integers to the sequence and returns the new sequence.
     * 
     * @param IntegerValue ...$integerValues The integer to add.
     * @return IntegerSequence The new sequence.
     */
    public function add(IntegerValue ...$integerValues): IntegerSequence
    {
        $items = $this->items;
        foreach ($integerValues as $integer) {
            $items[] = $integer;
        }

        return new IntegerSequence(...$items);
    }

    /**
     * Searches and removes each provided integers from the sequence and returns the new sequence.
     * 
     * @param IntegerValue ...$integerValues The integer to remove.
     * @return IntegerSequence The new sequence.
     */
    public function remove(IntegerValue ...$integerValues): IntegerSequence
    {
        $items = $this->items;
        foreach ($this->items as $i => $item) {
            foreach ($integerValues as $integer) {
                if ($item->equals($integer)) {
                    unset($items[$i]);
                    break;
                }
            }
        }
  
        return new IntegerSequence(...$items);
    }

    /**
     * Checks if the sequence has the provided integer.
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
