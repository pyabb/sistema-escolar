<?php

declare(strict_types=1);

namespace Penv;

class Penv
{
    public static function load(string $envPathFile)
    {
        $file = fopen($envPathFile, 'r');
        while(!feof($file))
        {
            $line = fgets($file);
            $values = explode('=', trim((string)$line));
            if(count($values) != 2) continue;
            list($key, $value) = $values;
            $_ENV[$key] = $value;
        }
        fclose($file);
    }
}
