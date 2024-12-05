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

use Eophantasy\Type\Bytes\Bytes;

/**
 * A class representing a sequence of bytes by a string.
 * 
 * The class is used to store a sequence of bytes **constantly** that is is not supposed to be changed.
 * This class is immutable, meaning that its value cannot be changed after it is created.
 */
class BytesByString extends Bytes
{
    /**
     * Creates a new instance from a string.
     * 
     * @param string $string The string to convert.
     */
    public function __construct(string $string)
    {
        parent::__construct(
            ...array_map(
                'ord',
                str_split($string)
            )
        );
    }
}