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
 * A class representing a duration of time in minutes.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class Minutes extends Duration
{
    /**
     * Creates a new Minutes instance.
     * 
     * @param int $minutes The duration in minutes.
     * @override
     */
    public function __construct(int $minutes)
    {
        parent::__construct($minutes * 1e6 * 60);
    }
}