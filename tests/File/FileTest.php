<?php

/*
 * This file is part of the Eophantasy package.
 *
 * (c) Ilya Sitnikov <sitnikovik@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eophantasy\Test\File;

use Eophantasy\Type\Bytes\BytesByString;
use Eophantasy\File\File;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * A class for testing the File class.
 * 
 * @covers File
 */
class FileTest extends TestCase
{
    /**
     * Tests the construct method.
     * 
     * @return void
     * @covers File::__construct
     */
    public function testConstruct(): void
    {
        $this->assertInstanceOf(
            File::class,
            new File('/tmp/test.txt')
        );
    }

    /**
     * Tests the exists method.
     * 
     * @return void
     * @covers File::exists
     */
    public function testExists(): void
    {
        $file = new File('/tmp/test.txt');

        $this->assertFalse($file->exists());

        $file->write(
            new BytesByString('Hello, world!')
        );

        $this->assertTrue($file->exists());
    }

    /**
     * Tests the read method.
     * 
     * @return void
     * @covers File::read
     * @covers File::write
     */
    public function testRead(): void
    {
        $file = new File('/tmp/test.txt');

        $file->write(
            new BytesByString('Hello, world!')
        );

        $this->assertEquals(
            'Hello, world!',
            $file->read()->toString()
        );
    }

    /**
     * Tests the read method when it fails.
     * 
     * @return void
     * @covers File::read
     */
    public function testReadThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Failed to read file "/usr/local/test.txt"');

        $file = new File('/usr/local/test.txt');
        $file->read();
    }

    /**
     * Tests the write method.
     * 
     * @return void
     * @covers File::write
     * @covers File::read
     */
    public function testWrite(): void
    {
        $file = new File('/tmp/test.txt');

        $file->write(
            new BytesByString('Hello, world!')
        );

        $this->assertEquals(
            'Hello, world!',
            $file->read()->toString()
        );
    }

    /**
     * Tests the write method when it fails.
     * 
     * @return void
     * @covers File::write
     */
    public function testWriteThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Failed to write to file "/usr/local/test.txt"');

        $file = new File('/usr/local/test.txt');
        $file->write(
            new BytesByString('Hello, world!')
        );
    }

    /**
     * Tests the delete method.
     * 
     * @return void
     * @covers File::delete
     * @covers File::write
     * @covers File::exists
     */
    public function testDelete(): void
    {
        $file = new File('/tmp/test.txt');

        $file->write(
            new BytesByString('Hello, world!')
        );

        $this->assertTrue($file->exists());

        $file->delete();

        $this->assertFalse($file->exists());
    }

    /**
     * Tests the delete method when it fails.
     * 
     * @return void
     * @covers File::delete
     */
    public function testDeleteThrowsException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Failed to delete file "/usr/local/test.txt"');

        $file = new File('/usr/local/test.txt');
        $file->delete();
    }
}