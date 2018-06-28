<?php
namespace Helper\Test;

use PHPUnit\Framework\TestCase;
use src\Helper\CommandLineError;

class CommandLineErrorHelperTest extends TestCase
{
    public function testCommandErrorHelperConstants()
    {
        $this->assertEquals(
            128,
            CommandLineError::INVALID_ARGUMENT,
            'const INVALID_ARGUMENT must be 128.'
        );
        $this->assertEquals(
            1,
            CommandLineError::CATCHALL,
            'const CATCHALL must be 1.'
        );
        $this->assertEquals(
            126,
            CommandLineError::COMMAND_INVOKED_CANNOT_EXECUTE,
            'const COMMAND_INVOKED_CANNOT_EXECUTE must be 126.'
        );
        $this->assertEquals(
            127,
            CommandLineError::COMMAND_NOT_FOUND,
            'const COMMAND_NOT_FOUND must be 126.'
        );
        $this->assertEquals(
            128,
            CommandLineError::FATAL_ERROR,
            'const COMMAND_NOT_FOUND must be 128.'
        );
    }
}