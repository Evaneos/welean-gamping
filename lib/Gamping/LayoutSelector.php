<?php

namespace Gamping;

class LayoutSelector 
{
    private $defaultLayout = '';
    
    private $layouts = array();
    
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
        
        return new Layout($this->layouts[$key]);
    }
    
    public function setDefaultLayout($key)
    {
        $this->defaultLayout = $key;
    }
    
}