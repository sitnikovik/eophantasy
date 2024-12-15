<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Method;

use Stringable;

/**
 * An interface representing a method.
 * 
 * A method is a string that represents an HTTP method.
 * For example, 'GET', 'POST', 'PUT', 'DELETE', etc.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods
 */
interface Method extends Stringable
{
}