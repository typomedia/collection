<?php

namespace Typomedia\Collection;

use RecursiveArrayIterator;
use RecursiveIteratorIterator;

/**
 * Class Collection
 * @package Typomedia\Collection
 */
class Collection
{
    /**
     * @var array
     */
    public $items = [];

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->items[$key];
        }

        return null;
    }

    /**
     * @param object $object
     * @param null $key
     */
    public function set($object, $key = null)
    {
        if ($key === null) {
            $this->items[] = $object;
        } else {
            if (!$this->has($key)) {
                $this->items[$key] = $object;
            }
        }
    }

    /**
     * @param $key
     */
    public function delete($key)
    {
        if ($this->has($key)) {
            unset($this->items[$key]);
        }
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->items[$key]);
    }

    /**
     * @return int[]|string[]
     */
    public function keys()
    {
        return array_keys($this->items);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @param int $offset
     * @return int|string
     */
    public function first($offset = 0)
    {
        return $this->arrayKeyFirst($offset);
    }

    /**
     * @param int $offset
     * @return int|string
     */
    public function last($offset = 0)
    {
        return $this->arrayKeyLast($offset);
    }

    /**
     * @param $key
     * @param $value
     * @return array
     */
    public function find($key, $value)
    {
        return $this->arraySearchRecursive($key, $value);
    }

    /**
     * @param int $offset
     * @return int|string
     */
    protected function arrayKeyFirst($offset = 0)
    {
        // if offset is negative
        $offset = (integer)abs($offset);
        // if offset too high
        if ($offset > $this->count()) {
            $offset = $this->count() - 1;
        }

        return $this->items[$offset];
    }

    /**
     * @param int $offset
     * @return int|string
     */
    protected function arrayKeyLast($offset = 0)
    {
        // if offset is negative
        $offset = (integer)abs($offset);
        // if offset too high
        if ($offset > $this->count()) {
            $offset = $this->count() - 1;
        }

        $offset = $this->count() - (1 + $offset);
        return $this->items[$offset];
    }

    /**
     * @param mixed $key
     * @param mixed $value
     * @return array
     */
    protected function arraySearchRecursive($key, $value)
    {
        $result = [];
        $iterator  = new RecursiveArrayIterator($this->items);
        $recursive = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);

        foreach ($recursive as $k => $v) {
            if ($k === $key && $v === $value) {
                $result[] = $iterator->key();
            }
        }

        return $result;
    }
}
