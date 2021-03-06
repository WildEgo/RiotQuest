<?php

namespace RiotQuest\Components\Collections;

use Closure;
use Illuminate\Support\Collection as Module;

/**
 * Class Collection
 *
 * @see https://github.com/supergrecko/RiotQuest/wiki/Return-Types
 *
 * Definition which each DTO extends to make working with
 * API responses easier and more flexible
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class Collection extends Module
{

    /**
     * Region identifier for requests
     *
     * @var null|string
     */
    protected $region = null;

    /**
     * Collection constructor.
     *
     * @param array $items
     * @param null $region
     */
    public function __construct($items = [], $region = null)
    {
        parent::__construct($items);
        $this->region = $region;
    }

    /**
     * @param string $region
     */
    public function setRegion(string $region)
    {
        $this->region = $region;
    }

    /**
     * @return Collection
     */
    public function recursive() {
        return $this->map(function ($value) {
            if (is_array($value) || is_object($value)) {
                return (new self($value))->recursive();
            }

            return $value;
        });
    }

    /**
     * Array filter, but returns array instead of collection
     *
     * @param Closure $closure
     * @return array
     */
    public function filterArr(Closure $closure)
    {
        return array_filter($this->items, $closure);
    }

    /**
     * Array map, but returns array instead of collection
     *
     * @param Closure $closure
     * @return array
     */
    public function mapArr(Closure $closure)
    {
        return array_map($closure, $this->items);
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function __get($key)
    {
        return $this->items[$key] ?? null;
    }

}
