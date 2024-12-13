<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\File;

use Eophantasy\IO\Reader;
use Eophantasy\Type\Bytes\Bytes;
use Eophantasy\Type\Bytes\BytesByString;
use Eophantasy\IO\Writer;
use Exception;

/**
 * A class representing a file.
 *  
 * This class is used to read and write content to a file.
 * This class implements the Writer and Reader interfaces to allow writing and reading content.
 * It is immutable, meaning that its value cannot be changed after it is created.
 */
final class File implements Writer, Reader
{
    /**
     * The path to the file.
     * 
     * @var string
     */
    private $path;

    /**
     * Creates a new File instance.
     * 
     * @param string $path The path to the file.
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Writes the content to the file.
     * 
     * @param Bytes $content The content to write.
     * @return void
     * @throws Exception If the file cannot be written.
     */
    public function write(Bytes $content): void
    {
        $ok = file_put_contents($this->path, $content->toString());
        if (!$ok) {
            throw new Exception(
                sprintf(
                    "Failed to write to file \"%s\"",
                    $this->path
                )
            );
        }
    }

    /**
     * Reads the content of the file.
     * 
     * @return Bytes
     * @throws Exception If the file cannot be read.
     */
    public function read(): Bytes
    {
        $content = file_get_contents($this->path);
        if ($content === false) {
            throw new Exception(
                sprintf(
                    "Failed to read file \"%s\"",
                    $this->path
                )
            );
        }

        return new BytesByString($content);
    }

    /**
     * Deletes the file.
     * 
     * @return void
     * @throws Exception If the file failed to delete.
     */
    public function delete(): void
    {
        $ok = unlink($this->path);
        if (!$ok) {
            throw new Exception(
                sprintf(
                    "Failed to delete file \"%s\"",
                    $this->path
                )
            );
        }
    }

    /**
     * Checks if the file exists.
     * 
     * @return bool
     */
    public function exists(): bool
    {
        return file_exists($this->path);
    }
}
