<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Header;

use Stringable;

/**
 * An interface representing a header.
 * 
 * A header is a string that represents an HTTP header.
 * For example, 'Content-Type', 'User-Agent', 'Accept', etc.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
 */
final class Header implements Stringable
{
    /**
     * Header name.
     * 
     * @var string
     */
    private $name;

    /**
     * Header value.
     * 
     * @var string
     */
    private $value;

    /**
     * Constructs a new Header.
     * 
     * A header is a string that represents an HTTP header.
     * 
     * @param string $name The name of the header, for example, 'Content-Type'.
     * @param string $value The value of the header, for example, 'application/json'.
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Returns the string representation of the header.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->name . ': ' . $this->value;
    }
}
