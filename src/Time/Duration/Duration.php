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
 * A class representing a duration of time.
 * 
 * The duration is represented in microseconds.
 * It can be converted to other units of time using the provided methods.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
class Duration
{
    /**
     * The duration in microseconds.
     * 
     * @var int
     */
    private int $microseconds;

    /**
     * Creates a new NowDuration instance.
     * 
     * @param int $microseconds The duration in microseconds.
     * @override
     */
    protected function __construct(int $microseconds)
    {
        $this->microseconds = $microseconds;
    }

   /**
     * Adds the provided duration to the current duration.
     * 
     * @param self $duration The duration to add.
     * @return self The new duration.
     */
    final public function add(self $duration): self
    {
        return new self($this->microseconds() + $duration->microseconds());
    }

    /**
     * Subtracts the provided duration from the current duration.
     * 
     * @param self $duration The duration to subtract.
     * @return self The new duration.
     */
    final public function subtract(self $duration): self
    {
        return new self($this->microseconds() - $duration->microseconds());
    }

    /**
     * Represents the duration in hours.
     * 
     * @return int A number of full hours.
     */
    final public function hours(): int
    {
        return $this->minutes() / 60;
    }

    /**
     * Represents the duration in hours.
     * 
     * @return int A number of full minutes
     */
    final public function minutes(): int
    {
        return $this->seconds() / 60;
    }

    /**
     * Represents the duration in seconds.
     * 
     * @return int A number of full seconds.
     */
    final public function seconds(): int
    {
        return $this->microseconds() / 1e6;
    }

    /**
     * Represents the duration in milliseconds.
     * 
     * @return int A number of full milliseconds.
     */
    final public function milliseconds(): int
    {
        return $this->microseconds() / 1e3;
    }

    /**
     * Represents the duration in microseconds
     * 
     * @return int A number of microseconds.
     */
    final public function microseconds(): int
    {
        return $this->microseconds;
    }
}