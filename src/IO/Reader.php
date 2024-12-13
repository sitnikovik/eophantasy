<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\IO;

use Eophantasy\Type\Bytes\Bytes;

/**
 * An interface for reading content as bytes from an input.
 * 
 * This interface is used to read content from an input, 
 * such as a file or a network socket or some other source.
 */
interface Reader
{
    /**
     * Reads the content from the input.
     * 
     * @return Bytes
     */
    public function read(): Bytes;
}