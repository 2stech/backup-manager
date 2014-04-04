<?php

use BigName\DatabaseBackup\Commands\Archiving\GzipFile;
use Mockery as m;

class GzipFileTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        m::close();
    }

    public function test_can_create()
    {
        $shell = m::mock('BigName\DatabaseBackup\ShellProcessing\ShellProcessor');
        $Gzip = new GzipFile('foo', $shell);
        $this->assertInstanceOf('BigName\DatabaseBackup\Commands\Archiving\GzipFile', $Gzip);
    }

    public function test_generates_correct_command()
    {
        $shell = m::mock('BigName\DatabaseBackup\ShellProcessing\ShellProcessor');
        $shell->shouldReceive('process')->with("gzip 'foo'");

        $Gzip = new GzipFile('foo', $shell);
        $Gzip->execute();
    }
}
