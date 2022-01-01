<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Parameters;

class ParametersTest extends TestCase
{
    public function testParameters() : void
    {
        $params = Parameters::getInstance();

        $this->assertInstanceOf(Parameters::class, $params);

        $params->setProperty('test', 'test_value');
        $this->assertEquals('test_value', $params->getProperty('test'));
    }

}