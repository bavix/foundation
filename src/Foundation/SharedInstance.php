<?php

namespace Bavix\Foundation;

trait SharedInstance
{

    /**
     * @var static
     */
    protected static $instance;

    /**
     * @param array ...$arguments
     *
     * @return static
     */
    public static function sharedInstance(...$arguments)
    {
        if (!static::$instance)
        {
            static::$instance = new static(...$arguments);
        }

        return static::$instance;
    }

    /**
     * @inheritdoc
     *
     * @return void
     */
    final public function __wakeup()
    {

    }

    /**
     * @inheritdoc
     *
     * @return void
     */
    final private function __clone()
    {

    }

}
