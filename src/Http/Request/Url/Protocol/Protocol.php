<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request\Url\Protocol;

use Stringable;

/**
 * An interface for the protocol scheme of a URL.
 * 
 * A protocol is a string that represents the protocol scheme of a URL.
 * For example, 'http', 'https', 'ftp', etc.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/API/URL/protocol
 */
interface Protocol extends Stringable
{
}