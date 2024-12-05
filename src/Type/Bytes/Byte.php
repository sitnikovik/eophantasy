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

/**
 * A class representing a byte.
 * 
 * This class is immutable, meaning that its value cannot be changed after it is created.
 */
class Byte
{
    /**
     * The byte value.
     * 
     * @var int
     */
    private $value;

    /**
     * Creates a new Byte instance.
     * 
     * @param int $value The byte value.
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * Returns the byte value.
     * 
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * Determines if the current byte is equal to the provided byte.
     * 
     * @param Byte $byte The byte to compare.
     * @return bool
     */
    public function equals(Byte $byte): bool
    {
        return $this->value === $byte->value;
    }
}