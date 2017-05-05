<?php

namespace Bavix\Foundation\Arrays;

use Bavix\Iterator\Iterator;

class Collection implements \IteratorAggregate, \Countable
{

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
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @param array|Iterator|Collection $data
     *
     * @return array
     */
    protected function toArray($data)
    {
        if ($data instanceof Iterator || $data instanceof self)
        {
            return $data->asArray();
        }

        return $data;
    }

    /**
     * @return Iterator
     */
    public function getIterator()
    {
        return new Iterator($this->data);
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
        return new static(array_filter($this->data, $callback));
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
     * @param Collection|Iterator|array $data
     *
     * @return static
     */
    public function merge($data)
    {
        return new static(array_merge($this->data, $this->toArray($data)));
    }

    /**
     * @param Collection|Iterator|array $data
     *
     * @return static
     */
    public function diff($data)
    {
        return new static(array_diff($this->data, $this->toArray($data)));
    }

    /**
     * @param Collection|Iterator|array $data
     *
     * @return static
     */
    public function diffKey($data)
    {
        return new static(array_diff_key($this->data, $this->toArray($data)));
    }

    /**
     * @param Collection|Iterator|array $data
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

}
