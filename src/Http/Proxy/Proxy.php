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
use Eophantasy\Http\Request\Url\Host\Host;
use Exception;
use Stringable;

/**
 * A class representing a proxy.
 * 
 * A proxy is an intermediary server that separates the user from the websites they browse.
 * 
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Proxies
 */
class Proxy implements Stringable
{
    /**
     * The constructor.
     * 
     * @param Host $host The proxy host.
     */
    public function __construct(
        private Host $host
    ) {}

    /**
     * Represents the proxy as string.
     * 
     * @return string
     */
    public function __toString(): string
    {
        return $this->host->__toString();
    }

    /**
     * @inheritDoc
     * @override
     */
    public function wrapCurl(CurlHandle $curl): CurlHandle
    {
        $newCurl = curl_copy_handle($curl);
        if ($newCurl === false) {
            throw new Exception('Failed to copy cURL handle');
        }
        curl_setopt($newCurl, CURLOPT_PROXY, $this->__toString());

        return $newCurl;
    }
}
