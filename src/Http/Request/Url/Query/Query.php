<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Url\Query;

use Stringable;

/**
 * A class representing a query parameter of a URL.
 * 
 * A query parameter is a key-value pair that is appended to the end of a URL.
 * For example, 'page=2'.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/API/URL/search
 */
final class Query implements Stringable
{
    /**
     * The name of the query parameter.
     * 
     * @var string
     */
    public $name;

    /**
     * The value of the query parameter.
     * 
     * @var string
     */
    public $value;

    /**
     * Constructs a new Query.
     * 
     * A query parameter is a key-value pair that is appended to the end of a URL.
     * 
     * @param string $name The name of the query parameter, for example, 'page'.
     * @param string $value The value of the query parameter, for example, '2'.
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Returns the string representation of the query.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->name . '=' . $this->value;
    }
}