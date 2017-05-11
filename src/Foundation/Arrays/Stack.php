<?php

namespace Bavix\Foundation\Arrays;

use Bavix\Iterator\Traits\Countable;

class Stack implements Interfaces\DataStructures
{

    use Countable;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * Queue constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function push($mixed)
    {
        $this->data[] = $mixed;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function pop()
    {
        return array_pop($this->data);
    }

    /**
     * @inheritdoc
     */
    public function isEmpty()
    {
        return empty($this->data);
    }

    /**
     * @inheritdoc
     */
    public function getGenerator()
    {
        $self = clone $this;

        while (!$self->isEmpty())
        {
            yield $self->pop();
        }
    }

}
