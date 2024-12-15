<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Request;

use CurlHandle;
use Eophantasy\Http\Response\Response;

/**
 * An interface for HTTP requests to send to a server.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP
 */
interface Request
{
    /**
     * Sends the request and returns the response.
     * 
     * @return Response
     */
    public function response(): Response;

    /**
     * Converts the request to a cURL handle.
     * 
     * Used internally to build a cURL request to be sent.
     * 
     * @return CurlHandle
     */
    public function cURL(): CurlHandle;
}
