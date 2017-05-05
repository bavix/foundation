<?php

namespace Bavix\Foundation\Arrays;

use Bavix\Iterator\Traits;
use Traversable;

class Collection implements \IteratorAggregate, \Countable
{

    use Traits\IteratorAggregate;
    use Traits\Countable;

    /**
     * @var array
     */
    protected $data;

    /**
     * Collection constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        return $this->data;
    }

    /**
     * @param array|Traversable $data
     *
     * @return array
     */
    protected function toArray($data)
    {
        if ($data instanceof Traversable)
        {
            return \iterator_to_array($data);
        }

        return $data;
    }

    /**
     * @param callable $callback
     *
     * @return static
     */
    public function map(callable $callback)
    {
        return new static(array_map($callback, $this->data));
    }

    /**
     * @param callable $callback
     *
     * @return static
     */
    public function filter(callable $callback)
    {
        return new static(array_filter($this->data, $callback, ARRAY_FILTER_USE_BOTH));
    }

    /**
     * @return static
     */
    public function reverse()
    {
        return new static(array_reverse($this->data));
    }

    /**
     * @return static
     */
    public function flip()
    {
        return new static(array_flip($this->data));
    }

    /**
     * @param Traversable|array $data
     *
     * @return static
     */
    public function merge($data)
    {
        return new static(array_merge($this->data, $this->toArray($data)));
    }

    /**
     * @param Traversable|array $data
     *
     * @return static
     */
    public function diff($data)
    {
        return new static(array_diff($this->data, $this->toArray($data)));
    }

    /**
     * @param Traversable|array $data
     *
     * @return static
     */
    public function diffKey($data)
    {
        return new static(array_diff_key($this->data, $this->toArray($data)));
    }

    /**
     * @param Traversable|array $data
     *
     * @return static
     */
    public function diffAssoc($data)
    {
        return new static(array_diff_assoc($this->data, $this->toArray($data)));
    }

    /**
     * @param int  $size
     * @param null $preserveKeys
     *
     * @return static
     */
    public function chunk($size, $preserveKeys = null)
    {
        return new static(array_chunk($this->data, $size, $preserveKeys));
    }

    /**
     * @param mixed $mixed
     * @param null  $indexKey
     *
     * @return static
     */
    public function column($mixed, $indexKey = null)
    {
        return new static(array_column($this->data, $mixed, $indexKey));
    }

    /**
     * @param callable $callback
     *
     * @return static
     */
    public function walk(callable $callback)
    {
        return new static(array_walk($this->data, $callback));
    }

    /**
     * @param callable $callback
     *
     * @return static
     */
    public function walkRecursive(callable $callback)
    {
        return new static(array_walk_recursive($this->data, $callback));
    }

    /**
     * @return static
     */
    public function unique()
    {
        return new static(array_unique($this->data));
    }

    /**
     * @return static
     */
    public function values()
    {
        return new static(array_values($this->data));
    }

    /**
     * @return static
     */
    public function keys()
    {
        return new static(array_keys($this->data));
    }

    /**
     * @return static
     */
    public function shuffle()
    {
        return $this->sortWith(function ()
        {
            return random_int(-1, 1);
        });
    }

    /**
     * @param callable $callback
     *
     * @return static
     */
    public function sortWith(callable $callback)
    {
        $data = $this->data;
        uasort($data, $callback);

        return new static($data);
    }

}
