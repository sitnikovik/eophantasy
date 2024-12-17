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
 * A class representing a duration of time in seconds.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class Seconds extends Duration
{
    /**
     * Creates a new Seconds instance.
     * 
     * @param int $seconds The duration in seconds.
     * @override
     */
    public function __construct(int $seconds)
    {
        parent::__construct($seconds * 1e6);
    }
}
