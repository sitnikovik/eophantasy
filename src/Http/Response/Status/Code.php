<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Response\Status;

use Eophantasy\Type\Integer\Intable;
use Stringable;

/**
 * A class representing an HTTP response status code.
 * 
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
class Code implements Stringable, Intable
{
    /**
     * The status code.
     * 
     * @var int
     */
    private $code;

    /**
     * Creates a new StatusCode instance.
     * 
     * @param int $code The status code.
     */
    public function __construct(int $code)
    {
        $this->code = $code;
    }

    /**
     * Returns the status code.
     * 
     * @return int
     */
    public function toInt(): int
    {
        return $this->code;
    }

    /**
     * Returns a string representation of the status code.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->code;
    }

    /**
     * Checks if the status code is an informational.
     * 
     * @return bool
     */
    public function info(): bool
    {
        return $this->code >= 100 && $this->code < 200;
    }

    /**
     * Checks if the status code is a redirect.
     * 
     * @return bool
     */
    public function redirect(): bool
    {
        return $this->code >= 300 && $this->code < 400;
    }

    /**
     * Checks if the status code is a success.
     * 
     * @return bool
     */
    public function success(): bool
    {
        return $this->code >= 200 && $this->code < 300;
    }

    /**
     * Checks if the status code is a client error.
     * 
     * @return bool
     */
    public function clientError(): bool
    {
        return $this->code >= 400 && $this->code < 500;
    }

    /**
     * Checks if the status code is a server error.
     * 
     * @return bool
     */
    public function serverError(): bool
    {
        return $this->code >= 500;
    }
}

