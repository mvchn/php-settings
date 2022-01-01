<?php

namespace App\Tests;

use App\BaseSettings;
use App\Settings;
use PHPUnit\Framework\TestCase;
use App\UserSettings;

class SettingsTest extends TestCase
{
    public function testSettings() : void
    {
        $instance = new Settings('test', 'test');

        $this->assertEquals('test', $instance->getName());
        $this->assertEquals(BaseSettings::SCOPE_APPLICATION, $instance->getScope());
        $this->assertEquals('test', $instance->getType());
        $this->assertEquals(null, $instance->getValue());

        $instance = new UserSettings('testUser', 'testUser');

        $this->assertEquals('testUser', $instance->getName());
        $this->assertEquals(BaseSettings::SCOPE_USER, $instance->getScope());
        $this->assertEquals('testUser', $instance->getType());
        $this->assertEquals(null, $instance->getValue());
    }

    public function testReadWriteScope() : void
    {
        $appSettings = new Settings('test', 'test', BaseSettings::SCOPE_APPLICATION, 'value');

        $this->expectException(\RuntimeException::class);

        $appSettings->setValue('value2');
    }
}