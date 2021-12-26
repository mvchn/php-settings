<?php


class UserSettings extends \App\BaseSettings
{
    public function __construct(string $name, string $type, int $scope = self::SCOPE_USER, $value = null)
    {
        \App\BaseSettings::__construct($name, $type, $scope, $value);
    }



}