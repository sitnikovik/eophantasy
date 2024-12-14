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

use Stringable;

/**
 * An interface representing a URL.
 * 
 * A URL is a string that represents a Uniform Resource Identifier.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/API/URL
 */
interface Url extends Stringable
{
}