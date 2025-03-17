<?php

namespace App;

class Container
{
    protected $items = [];
    public function bild($key, $value)
    {
        $this->items[$key] = $value;
    }
    public function resolve($key)
    {
        return call_user_func($this->items[$key]);
    }
}