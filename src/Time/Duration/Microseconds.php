<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Time\Duration;

/**
 * A class representing a duration of time in microseconds.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class Microseconds extends Duration
{
    /**
     * Creates a new Microseconds instance.
     * 
     * @param int $microseconds The duration in microseconds.
     * @override
     */
    public function __construct(int $microseconds)
    {
        parent::__construct($microseconds);
    }
}