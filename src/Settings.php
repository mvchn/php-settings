<?php

namespace App;

class Settings
{
    const SCOPE_USER = 1;
    const SCOPE_APPLICATION = 101;

    private string $name;

    private string $type;

    private int $scope;

    private $value;

    public function __construct(string $name, string $type, int $scope = self::SCOPE_APPLICATION, $value = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->scope = $scope;
        $this->value = $value;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getType() : string
    {
        return $this->type;
    }

    public function getScope() : int
    {
        return $this->scope;
    }

    public function getValue()
    {
        return $this->value;
    }


}