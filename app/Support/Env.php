<?php

namespace App\Support;


class Env
{
    public static function get(string $name)
    {
        return $_ENV[$name];
    }
}
