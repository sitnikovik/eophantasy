<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Type\Time\Duration;

/**
 * A class representing a duration of time in nanoseconds.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class NowDuration extends Duration
{
    /**
     * Creates a new NowDuration instance.
     */
    public function __construct()
    {
        parent::__construct(microtime(true) * 1e9);
    }
}