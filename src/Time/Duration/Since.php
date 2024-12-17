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
 * A class representing a duration of time since a given duration.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class Since extends Duration
{
    /**
     * Creates a new DurationFrom instance that represents the duration since a given duration.
     * 
     * @param Duration $from The duration since which to calculate the duration.
     * @override
     */
    public function __construct(Duration $from)
    {
        parent::__construct(
            (new Now())
                ->subtract($from)
                ->microseconds()
        );
    }
}
