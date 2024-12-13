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
 * An interface for writing content as bytes to an output.
 * 
 * This interface is used to write content to an output, 
 * such as a file or a network socket or some other destination.
 */
interface Writer
{
    /**
     * Writes the bytes to the output.
     * 
     * @param Bytes $bytes The bytes to write.
     * @return void
     */
    public function write(Bytes $bytes): void;
}