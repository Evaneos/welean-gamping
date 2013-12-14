<?php

namespace Gamping;

class ArrayWrapper implements \ArrayAccess, \Iterator
{
    
    private $data;
    
    private $wrapArrays = false;
    
    public function __construct(array $data)
    {
        $this->data = $data;    
    }
    
    public function wrapArrays($enabled = true)
    {
        $this->wrapArrays = $enabled;
    }
    
    public function tryGet($path, $defaultValue = null)
    {
        if (! array_key_exists($path, $this->data)) {
            return $this->returnValue($defaultValue);
        }
        
        return $this->returnValue($this->data[$path]);
    }
    
    private function returnValue($value) 
    {
        if (is_array($value)) {
            $value = new self($value);
            $value->wrapArrays($this->wrapArrays);
        }    
        
        return $value;
    }
    
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data);
    }
    
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }
    
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }
    
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
    
    public function current()
    {
        return current($this->data);
    }
    
    public function key()
    {
        return key($this->data);
    }
    
    public function next()
    {
        return next($this->data);
    }
    
    public function rewind()
    {
        return reset($this->data);
    }
    
    public function valid()
    {
        return $this->current();
    }
}