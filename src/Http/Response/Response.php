<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Response;

use Eophantasy\Http\Response\Status\Code;
use Eophantasy\IO\Reader;
use Eophantasy\Time\Durationable;

/**
 * An interface for reading HTTP responses.
 * 
 * A response is a message that is sent by a server in response to an HTTP request.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Messages
 */
interface Response extends Reader, Durationable
{
    /**
     * Returns the status code.
     * 
     * @return Code
     */
    public function statusCode(): Code;
}


