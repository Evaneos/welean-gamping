<?php

namespace Gamping\Layout;

class Selector 
{
    private $layoutBuilder;
    
    private $defaultLayout = '';
    
    private $layouts = array();
    
    public function setBuilder(Builder $builder)
    {
        $this->layoutBuilder = $builder;
    }
    
    public function addLayout($key, $file)
    {
        $this->layouts[$key] = $file;
    }
    
    public function getLayout($key)
    {
        if (! array_key_exists($key, $this->layouts)) {
            if ($key != $this->defaultLayout) {
                return $this->getLayout($this->defaultLayout);
            } else {
                throw new \RuntimeException(sprintf('Layout not found ["%s"].', $key));
            }
        }
        
        return $this->layoutBuilder->build($key, $this->layouts[$key]);
    }
    
    public function setDefaultLayout($key)
    {
        $this->defaultLayout = $key;
    }
    
}