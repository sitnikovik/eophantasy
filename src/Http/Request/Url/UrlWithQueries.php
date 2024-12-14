<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Url;

use Eophantasy\Http\Request\Url\Query\Query;

/**
 * A class represents a URL with queries.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/API/URL
 */
final class UrlWithQueries implements Url
{
    /**
     * The origin URL.
     * 
     * @var Url
     */
    private $origin;

    /**
     * The URL queries.
     * 
     * @var Query[]
     */
    private $queries;

    /**
     * Creates a new URL.
     * 
     * @param BaseUri $base The URL base.
     * @param Query[] $queries The URL queries.
     */
    public function __construct(Url $url, Query ...$queries)
    {
        $this->origin = $url;
        $this->queries = $queries;
    }

    /**
     * Returns the string representation of the URL.
     * 
     * @return string
     */
    public function __toString(): string
    {
        $url = (string) $this->origin;

        if (count($this->queries) > 0) {
            $queries = [];
            foreach ($this->queries as $query) {
                $queries[] = (string) $query;
            }
            $url .= '?' . implode('&', $queries);
        }

        return $url;
    }
}