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
use Eophantasy\Http\Proxy\Proxy;
use Eophantasy\Http\Response\Response;

/**
 * A class representing an HTTP request with a proxy.
 * 
 * This class is used to send HTTP requests to a server via a proxy to hide the previous client information.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Proxy_servers
 */
final class RequestWithProxy implements Request
{
    /**
     * Creates a new request with a proxy.
     * 
     * @param Request $origin The original request.
     * @param Proxy $proxy The proxy to use.
     */
    public function __construct(
        private Request $origin,
        private Proxy $proxy
    ) {}

    /**
     * Returns the original request.
     * 
     * @return Request
     */
    public function origin(): Request
    {
        return $this->origin;
    }

    /**
     * Returns the proxy.
     * 
     * @return Proxy
     */
    public function proxy(): Proxy
    {
        return $this->proxy;
    }

    /**
     * @inheritDoc
     * @override
     */
    public function cURL(): CurlHandle
    {
        return $this->proxy->wrapCurl(
            $this->origin->cURL()
        );
    }

    /**
     * @inheritDoc
     * @override
     */
    public function response(): Response
    {
        return (new CurlWrap(
            $this->cURL()
        ))->response();
    }
}
