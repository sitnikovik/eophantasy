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
 * A class representing a duration of time in hours.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class Hours extends Duration
{
    /**
     * Creates a new Seconds instance.
     * 
     * @param int $hours The duration in hours.
     * @override
     */
    public function __construct(int $hours)
    {
        parent::__construct($hours * 1e6 * 60 * 60);
    }
}
