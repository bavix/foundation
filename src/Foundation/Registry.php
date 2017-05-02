<?php

namespace Bavix\Foundation;

trait Registry
{

    /**
     * @var array
     */
    protected static $registryData = [];

    /**
     * @param string $key
     *
     * @return mixed
     */
    public static function get($key)
    {
        return self::$registryData[$key] ?? null;
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public static function set($key, $value)
    {
        self::$registryData[$key] = $value;
    }

}
