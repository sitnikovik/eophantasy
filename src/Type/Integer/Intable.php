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

/**
 * An interface for objects that can be converted to an integer.
 */
interface Intable
{
    /**
     * Returns the integer representation of the object.
     * 
     * @return int
     */
    public function toInt(): int;
}