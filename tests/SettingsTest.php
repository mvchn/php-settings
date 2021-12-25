<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Settings;

class SettingsTest extends TestCase
{
    public function testSettings()
    {
        $instance = new Settings('test', 'test');

        $this->assertEquals('test', $instance->getName());
        $this->assertEquals(Settings::SCOPE_APPLICATION, $instance->getScope());
        $this->assertEquals('test', $instance->getType());
        $this->assertEquals(null, $instance->getValue());
    }
}