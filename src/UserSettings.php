<?php

namespace App;

class UserSettings extends BaseSettings
{
    public function __construct(string $name, string $type, int $scope = self::SCOPE_USER, $value = null)
    {
        parent::__construct($name, $type, $scope, $value);
    }
}