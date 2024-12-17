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
 * A class representing a duration of time in milliseconds.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class Now extends Duration
{
    /**
     * Creates a new Milliseconds instance.
     * 
     * @param int $milliseconds The duration in milliseconds.
     * @override
     */
    public function __construct()
    {
        parent::__construct((int) microtime(true));
    }
}
