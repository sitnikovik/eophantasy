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
 * A class representing a proxy without SSL verification.
 * 
 * A proxy is an intermediary server that separates the user from the websites they browse.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Proxies
 */
final class ProxyWithoutSSL extends Proxy
{
    /**
     * Creates a new proxy without SSL.
     * 
     * @param Proxy $origin The original proxy.
     */
    public function __construct(
        private Proxy $origin
    ) {}

    /**
     * @inheritDoc
     * @override
     */
    public function wrapCurl(CurlHandle $curl): CurlHandle
    {
        $newCurl = $this->origin->wrapCurl($curl);
        curl_setopt($newCurl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($newCurl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($newCurl, CURLOPT_FOLLOWLOCATION, true); // Следовать за редиректами

        return $newCurl;
    }
}