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
 * A class representing a sequence of floats.
 * 
 * This class implements the Countable and Iterator interfaces 
 * to provide a way to work with the sequence as with an array.
 * This class is immutable, meaning that its values cannot be changed after it is created.
 */
class FloatSequence implements Countable, Iterator
{
    /**
     * The stored values.
     * 
     * @param FloatValue[] $items
     */
    private $items;

    /**
     * Creates a new FloatSequence instance.
     * 
     * @param FloatValue ...$floatValues The float values.
     */
    public function __construct(FloatValue ...$floatValues)
    {
        $this->items = $floatValues;
    }

    /**
     * Adds floats to the sequence and returns the new sequence.
     * 
     * @param FloatValue ...$floatValues The float to add.
     * @return FloatSequence The new sequence.
     */
    public function add(FloatValue ...$floatValues): FloatSequence
    {
        $items = $this->items;
        foreach ($floatValues as $float) {
            $items[] = $float;
        }

        return new FloatSequence(...$items);
    }

    /**
     * Searches and removes each provided floats from the sequence and returns the new sequence.
     * 
     * @param FloatValue ...$floatValues The float to remove.
     * @return FloatSequence The new sequence.
     */
    public function remove(FloatValue ...$floatValues): FloatSequence
    {
        $items = $this->items;
        foreach ($this->items as $i => $item) {
            foreach ($floatValues as $float) {
                if ($item->equals($float)) {
                    unset($items[$i]);
                    break;
                }
            }
        }
  
        return new FloatSequence(...$items);
    }

    /**
     * Checks if the sequence has the provided float.
     * 
     * @param FloatValue $float The float to check.
     * @return bool
     */
    public function has(FloatValue $float): bool
    {
        foreach ($this->items as $item) {
            if ($item->equals($float)) {
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
     * @return FloatValue
     */
    public function current(): FloatValue
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
