<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Http\Proxy;

use CurlHandle;

/**
 * A class representing a proxy with authentication.
 * 
 * A proxy is an intermediary server that separates the user from the websites they browse.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Proxy_servers
 */
final class ProxyWithAuth extends Proxy
{
    /**
     * Creates a new proxy with authentication.
     * 
     * @param Proxy $origin The original proxy.
     * @param string $username The username for the proxy.
     * @param string $password The password for the proxy.
     */
    public function __construct(
        private Proxy $origin,
        private string $username,
        private string $password,
    ) {}

    /**
     * Returns the username for the proxy.
     * 
     * @return string
     */
    public function username(): string
    {
        return $this->username;
    }

    /**
     * Returns the password for the proxy.
     * 
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     * @override
     */
    public function wrapCurl(CurlHandle $curl): CurlHandle
    {
        $newCurl = $this->origin->wrapCurl($curl);
        curl_setopt($newCurl, CURLOPT_PROXYUSERPWD, $this->username() . ':' . $this->password());

        return $newCurl;
    }
}
