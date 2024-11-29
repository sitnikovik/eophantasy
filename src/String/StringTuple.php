<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Types\String;

use Countable;
use Iterator;

/**
 * A class representing a list of string values with integer indexes.
 * 
 * It is a tuple of strings with a fixed length, meaning that the number of values in the tuple is constant.
 * It is immutable, meaning that its value cannot be changed after it is created.
 * 
 * This class implements the Countable and Iterator interfaces 
 * to provide a way to work with the tuple as with an array.
 */
class StringTuple implements Countable, Iterator
{
    /**
     * The stored items of the tuple as string values only.
     * 
     * @param StringValue[] $items
     */
    private $items;

    /**
     * Creates a new StringTuple instance.
     * 
     * @param StringValue ...$stringValues The string values.
     */
    public function __construct(StringValue ...$stringValues)
    {
        $this->items = $stringValues;
    }

    /**
     * Adds strings to the tuple and returns the new tuple.
     * 
     * @param StringValue ...$stringValues The string to add.
     * @return StringTuple The new tuple.
     */
    public function add(StringValue ...$stringValues): StringTuple
    {
        $items = $this->items;
        foreach ($stringValues as $string) {
            $items[] = $string;
        }

        return new StringTuple(...$items);
    }

    /**
     * Searches and removes the provided string from the tuple and returns the new tuple.
     * 
     * @param StringValue ...$stringValues The string to remove.
     * @return StringTuple The new tuple.
     */
    public function remove(StringValue ...$stringValues): StringTuple
    {
        $items = $this->items;
        foreach ($items as $key => $item) {
            foreach ($stringValues as $string) {
                if ($item->equals($string)) {
                    unset($items[$key]);
                }
            }
        }

        return new StringTuple(...$items);
    }

    /**
     * Checks if the provided string is in the tuple.
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