<?php

namespace App;

class Settings extends BaseSettings
{
    public function __construct(string $name, string $type, int $scope = self::SCOPE_APPLICATION, $value = null)
    {
        parent::__construct($name, $type, $scope, $value);
    }

    public function setValue($value): BaseSettings
    {
        throw new \RuntimeException('Cannot set value');
    }
}