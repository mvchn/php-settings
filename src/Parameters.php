<?php

namespace App;

class Parameters
{
    private static $instance;
    private array $props = [];

    private function __construct()
    {
    }

    public static function getInstance() : Parameters
    {
        if(empty(self::$instance)) {
            self::$instance = new Parameters();
        }

        return self::$instance;
    }

    public function setProperty(string $key, $val)
    {
        $this->props[$key] = $val;
    }

    public function getProperty(string $key)
    {
        return $this->props[$key];
    }
}