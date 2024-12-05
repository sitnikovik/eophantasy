<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Type\Bytes;

use Countable;
use Iterator;

/**
 * A class representing a sequence of bytes.
 * 
 * The class is used to store a sequence of bytes **constantly** that is is not supposed to be changed.
 * This class is immutable, meaning that its value cannot be changed after it is created.
 */
class Bytes implements Countable, Iterator
{
    /**
     * The bytes.
     * 
     * @var int[]
     */
    private $bytes;

    /**
     * Creates a new Bytes instance.
     * 
     * @param int ...$bytes The bytes.
     */
    public function __construct(int ...$bytes)
    {
        $this->bytes = $bytes;
    }

    /**
     * Counts the number of items in the sequence.
     * 
     * @return int
     */
    public function count(): int
    {
        return count($this->bytes);
    }

    /**
     * Checks if the current byte is equal to the provided byte.
     * 
     * @param Bytes $bytes The bytes to compare.
     * @return bool
     */
    public function equals(Bytes $bytes): bool
    {
        if ($this->count() !== $bytes->count()) {
            return false;
        }

        foreach ($this->bytes as $key => $byte) {
            if ($byte !== $bytes->bytes[$key]) {
                return false;
            }
        }

        return true;
    }

    /**
     * Represents the bytes as a string.
     * 
     * @return string
     */
    public function toString(): string
    {
        $result = [];
        foreach ($this->bytes as $byte) {
            $result[] = chr($byte);
        }

        return implode("", $result);
    }

    /**
     * Returns the current item.
     * 
     * @return int
     */
    public function current(): int
    {
        return current($this->bytes);
    }

    /**
     * Returns the current key.
     * 
     * @return int
     */
    public function key(): int
    {
        return key($this->bytes);
    }

    /**
     * Moves the internal pointer to the next item.
     * 
     * @return void
     */
    public function next(): void
    {
        next($this->bytes);
    }

    /**
     * Rewinds the internal pointer to the first item.
     * 
     * @return void
     */
    public function rewind(): void
    {
        reset($this->bytes);
    }

    /**
     * Checks if the current item is valid.
     * 
     * @return bool
     */
    public function valid(): bool
    {
        return key($this->bytes) !== null;
    }
}