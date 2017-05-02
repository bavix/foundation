<?php

namespace Bavix\Foundation;

trait SharedInstance
{

    /**
     * @return static
     */
    public static function sharedInstance()
    {
        static $sharedInstance;

        if (!$sharedInstance)
        {
            $sharedInstance = new static();
        }

        return $sharedInstance;
    }

}
