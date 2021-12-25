<?php

namespace App\Tests;

use App\UserSettings;
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

        $instance = new UserSettings('testUser', 'testUser');

        $this->assertEquals('testUser', $instance->getName());
        $this->assertEquals(Settings::SCOPE_USER, $instance->getScope());
        $this->assertEquals('testUser', $instance->getType());
        $this->assertEquals(null, $instance->getValue());
    }
}