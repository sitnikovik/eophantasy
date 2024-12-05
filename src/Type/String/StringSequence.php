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

use Countable;
use Iterator;

/**
 * A class representing a list of string values with integer indexes.
 * 
 * This class implements the Countable and Iterator interfaces 
 * to provide a way to work with the sequence as with an array.
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
class StringSequence implements Countable, Iterator
{
    /**
     * The stored items of the sequence as string values only.
     * 
     * @param StringValue[] $items
     */
    private $items;

    /**
     * Creates a new StringSequence instance.
     * 
     * @param StringValue ...$stringValues The string values.
     */
    public function __construct(StringValue ...$stringValues)
    {
        $this->items = $stringValues;
    }

    /**
     * Adds strings to the sequence and returns the new sequence.
     * 
     * @param StringValue ...$stringValues The string to add.
     * @return StringSequence The new sequence.
     */
    public function add(StringValue ...$stringValues): StringSequence
    {
        $items = $this->items;
        foreach ($stringValues as $string) {
            $items[] = $string;
        }

        return new StringSequence(...$items);
    }

    /**
     * Searches and removes the provided string from the sequence and returns the new sequence.
     * 
     * @param StringValue ...$stringValues The string to remove.
     * @return StringSequence The new sequence.
     */
    public function remove(StringValue ...$stringValues): StringSequence
    {
        $items = $this->items;
        foreach ($items as $key => $item) {
            foreach ($stringValues as $string) {
                if ($item->equals($string)) {
                    unset($items[$key]);
                }
            }
        }

        return new StringSequence(...$items);
    }

    /**
     * Checks if the provided string is in the sequence.
     * 
     * @param StringValue $string The string to check.
     * @return bool
     */
    public function has(StringValue $string): bool
    {
        foreach ($this->items as $item) {
            if ($item->equals($string)) {
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
     * @return StringValue
     */
    public function current(): StringValue
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