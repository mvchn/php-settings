<?php

namespace App;

class Parameters implements Parametable
{
    private static $instance;
    private array $props;
    private array $appProps;
    private static $applicationProps;

    private function __construct(array $default = [])
    {
        self::$applicationProps = $default;
        $this->props = [];
        $this->appProps = $default;
    }

    public static function getInstance(array $props = []) : Parameters
    {
        if(!empty(self::$instance) && !empty($props)) {
            throw new \RuntimeException('Application properties are exists');
        }

        if(empty(self::$instance)) {
            self::$instance = new Parameters($props);
        }

        return self::$instance;
    }

    public function setProperty(string $key, $val, int $scope = self::SCOPE_USER)
    {
        if(self::SCOPE_APPLICATION === $scope) {
            throw new \RuntimeException('You cannot set application property in runtime');
        }

        $this->props[$key] = $val;
    }

    public function getProperty(string $key, int $scope = self::SCOPE_USER)
    {
        //TODO: Must be refactored with delegation
        //TODO: Parameters priority is unknown. It mus be described
        if(array_key_exists($key, $this->props)) {
            return $this->props[$key];
        }

        if(array_key_exists($key, $this->appProps)) {
            return $this->appProps[$key];
        }

        //TODO: We must describe scope of properties
        throw new \RuntimeException(sprintf('There is no key %s in properties', $key));
    }
}