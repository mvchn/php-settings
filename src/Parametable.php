<?php

namespace App;

interface Parametable
{
    const SCOPE_USER = 1;
    const SCOPE_APPLICATION = 101;

    public function getProperty(string $key);
    public function setProperty(string $key, $val);
}