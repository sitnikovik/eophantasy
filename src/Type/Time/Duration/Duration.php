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
 * A class representing a duration of time.
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
    private $microseconds;

    /**
     * Creates a new NowDuration instance.
     */
    public function __construct()
    {
        $this->microseconds = microtime(true);
    }

   /**
     * Adds the provided duration to the current duration.
     * 
     * @param self $duration The duration to add.
     * @return self The new duration.
     */
    final public function add(self $duration): self
    {
        return new self($this->microseconds + $duration->microseconds());
    }

    /**
     * Subtracts the provided duration from the current duration.
     * 
     * @param self $duration The duration to subtract.
     * @return self The new duration.
     */
    final public function subtract(self $duration): self
    {
        return new self($this->microseconds - $duration->microseconds());
    }

    /**
     * Represents the duration in hours.
     * 
     * @return int A number of hours.
     */
    public function minutes(): int
    {
        return $this->microseconds / 60;
    }

    /**
     * Represents the duration in seconds.
     * 
     * @return int A number of seconds.
     */
    public function seconds(): int
    {
        return $this->microseconds / 1e6;
    }

    /**
     * Represents the duration in milliseconds.
     * 
     * @return int A number of milliseconds.
     */
    public function milliseconds(): int
    {
        return $this->microseconds / 1e3;
    }

    /**
     * Represents the duration in microseconds.
     * 
     * @return int A number of microseconds.
     */
    public function microseconds(): int
    {
        return $this->microseconds;
    }
}