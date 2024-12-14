<?php

namespace Eophantasy\Http\Request\Url\Fragment;

use Stringable;

/**
 * A class representing a URL fragment.
 * 
 * In URL it looks like this: https://example.com/path/to/resource"#fragment".
 * 
 * @see https://tools.ietf.org/html/rfc3986#section-3.5
 */
final class Fragment implements Stringable
{
    /**
     * The fragment.
     * 
     * @var string
     */
    private $fragment;

    /**
     * Constructs a new Fragment.
     * 
     * @param string $fragment The fragment name without the "#" symbol.
     */
    public function __construct(string $fragment)
    {
        $this->fragment = $fragment;
    }

    /**
     * Returns the string representation of the fragment.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->fragment;
    }
}