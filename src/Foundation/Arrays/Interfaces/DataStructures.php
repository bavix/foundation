<?php

namespace Bavix\Foundation\Arrays\Interfaces;

interface DataStructures extends \Countable
{

    /**
     * @param mixed $mixed
     *
     * @return $this
     */
    public function push($mixed);

    /**
     * @return mixed
     */
    public function pop();

    /**
     * @return bool
     */
    public function isEmpty();

    /**
     * @return \Generator
     */
    public function getGenerator();

}
