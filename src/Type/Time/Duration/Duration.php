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

use Stringable;

/**
 * A class representing a duration of time.
 */
abstract class Duration implements Stringable
{
    /**
     * The duration in microseconds.
     * 
     * @var int
     */
    private $microseconds;

    /**
     * Creates a new Duration instance.
     * 
     * @param int $microseconds The duration in microseconds.
     */
    public function __construct(int $microseconds)
    {
        $this->microseconds = $microseconds;
    }

    /**
     * Adds the provided duration to the current duration.
     * 
     * @param Duration $duration The duration to add.
     * @return Duration The new duration.
     */
    public function add(Duration $duration): Duration
    {
        return new Duration($this->microseconds + $duration->microseconds);
    }

    /**
     * Subtracts the provided duration to the current duration.
     * 
     * @param Duration $duration The duration to subtract.
     * @return Duration The new duration.
     */
    public function subtract(Duration $duration): Duration
    {
        return new Duration($this->microseconds + $duration->microseconds);
    }

    /**
     * Represents the duration in hours.
     * 
     * @return int
     */
    public function hours(): int
    {
        return $this->microseconds / 3.6e6;
    }

    /**
     * Represents the duration in minutes.
     * 
     * @return int
     */
    public function minutes(): int
    {
        return $this->microseconds / 6e4;
    }

    /**
     * Represents the duration in seconds.
     * 
     * @return int
     */
    public function seconds(): int
    {
        return $this->microseconds / 1e6;
    }

    /**
     * Represents the duration in milliseconds.
     * 
     * @return int
     */
    public function milliseconds(): int
    {
        return $this->nanoseconds / 1e6;
    }

    /**
     * Represents the duration in microseconds.
     * 
     * @return int
     */
    public function microseconds(): int
    {
        return $this->nanoseconds / 1e3;
    }

    /**
     * Represents the duration in nanoseconds.
     * 
     * @return int
     */
    public function nanoseconds(): int
    {
        return $this->nanoseconds;
    }

    public function __toString(): string
    {
        return json_encode([
            'nanoseconds' => $this->nanoseconds,
            'seconds' => $this->seconds(),
            'milliseconds' => $this->milliseconds(),
            'microseconds' => $this->microseconds(),
            'minutes' => $this->minutes(),
            'hours' => $this->hours()
        ]);
    }
}
