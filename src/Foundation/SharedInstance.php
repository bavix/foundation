<?php

namespace Bavix\Foundation;

trait SharedInstance
{

    /**
     * @var static
     */
    protected static $instance;

    /**
     * @return static
     */
    public static function sharedInstance()
    {
        if (!static::$instance)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

}
