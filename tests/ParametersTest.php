<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Parameters;

/**
 * Singleton pattern test.
 * $parameters property is shared between test cases
 */
class ParametersTest extends TestCase
{
    static private array $applicationParams = ['app.value' => 'HUGE_VALUE'];

    private $parameters;

    public function testParameters() : void
    {
        $parameters = $this->parameters = Parameters::getInstance(self::$applicationParams);

        $parameters->setProperty('test', 'test_value');
        $this->assertEquals('test_value', $parameters->getProperty('test'));
    }

    public function testUserScopeSuccess()
    {
        $parameters = $this->parameters = Parameters::getInstance();
        $this->assertEquals('test_value',  $parameters->getProperty('test'));
    }

    public function testUserScopeFail()
    {
        $parameters = $this->parameters = Parameters::getInstance();
        $this->expectException(\RuntimeException::class);
        $parameters->getProperty('test2');
    }

    public function testApplicationScopeSuccess() : void
    {
        $this->parameters = Parameters::getInstance();
        $parameters = $this->parameters;

        $this->assertEquals('HUGE_VALUE',  $parameters->getProperty('app.value', Parameters::SCOPE_APPLICATION));
    }

    public function testApplicationScopeFail() : void
    {
        $this->expectException(\RuntimeException::class);
        $this->parameters = Parameters::getInstance(['test' => 'test']);
    }

    public function testApplicationScopeNoPropertyFail() : void
    {
        $this->parameters = Parameters::getInstance();
        $parameters = $this->parameters;

        $this->expectException(\RuntimeException::class);
        $parameters->setProperty('test', 'test_value3', Parameters::SCOPE_APPLICATION);
    }

    public function testApplicationScopePropertyRuntimeFail() : void
    {
        $this->parameters = Parameters::getInstance();
        $parameters = $this->parameters;

        $this->expectException(\RuntimeException::class);
        $parameters->setProperty('test', 'test_value3', Parameters::SCOPE_APPLICATION);
    }

}