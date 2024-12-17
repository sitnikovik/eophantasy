<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Time;

use Eophantasy\Time\Duration\Duration;

/**
 * An interface for classes that represent a duration of time.
 */
interface Durationable
{
    /**
     * Returns the duration of time.
     * 
     * @return Duration The duration of time.
     */
    public function duration(): Duration;
}
