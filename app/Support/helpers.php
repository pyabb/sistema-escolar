<?php

use App\Support\Env;


if(!function_exists('env'))
{
    function env(string $variable): string
    {
        return Env::get($variable);
    }
}

if(!function_exists('asset'))
{
    function asset(string $path) : string
    {
        return env('APP_PATH') . "/assets/$path";
    }
}

if(!function_exists('images'))
{
    function images(string $path) : string
    {
        return env('APP_PATH') . "/images/$path";
    }
}

if(!function_exists('css'))
{
    function css(string $path) : string
    {
        return env('APP_PATH') . "/css/$path";
    }
}

if(!function_exists('js'))
{
    function js(string $path) : string
    {
        return env('APP_PATH') . "/js/$path";
    }
}

if(!function_exists('encrypt_password'))
{
    function encrypt_password(string $password) : string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

if (!function_exists('config'))
{
    function config(string $key)
    {
        $keys = explode('.', $key);
        $counter = count($keys) - 1;
        $value = null;

        for($i = 0; $i < $counter; $i++)
        {
            if(!$value)
            {
                $data =  require __DIR__ . '/../../config/' . $keys[$i] . '.php';
                $value = $data[$keys[$i + 1]];
                continue;
            }
            $value = $value[$keys[$i+1]];
        }
        return $value;
    }
}

if(!function_exists('app_path'))
{
    function app_path($path = null) : string
    {
        ($path == null) ? $separator = "" : $separator = "/";
        return env('APP_PATH') . $separator . "$path";
    }
}
