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
 * A class representing an interval duration of time.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class IntervalDuration extends Duration
{
    /**
     * Creates a new IntervalDuration instance.
     * 
     * @param int $nanoseconds The duration in nanoseconds.
     */
    public function __construct(Duration $from, Duration $to)
    {
        parent::__construct($to->nanoseconds() - $from->nanoseconds());
    }
}