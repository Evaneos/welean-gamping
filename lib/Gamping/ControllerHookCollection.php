<?php

namespace Gamping;

class ControllerHookCollection {
    
    private $before = array();
    
    private $after = array();
    
    public function addBeforeHook($output, $name)
    {
        if (! array_key_exists($output, $this->before)) {
            $this->before[$output] = array();
        }
        
        $this->before[$output][] = $name;
    }
    
    public function setBeforeHooks($output, array $names)
    {
        $this->before[$output] = $names;        
    }
    
    public function addAfterHook($output, $name)
    {
        if (! array_key_exists($output, $this->after)) {
            $this->after[$output] = array();
        }
        
        $this->after[$output][] = $name;
    }
    
    public function setAfterHooks($output, array $names)
    {
        $this->after[$output] = $names;
    }
    
    public function runBefore($controller, $output)
    {
        $this->runMethods($controller, $this->before, $output);
    }
    
    public function runAfter($controller, $output)
    {
        $this->runMethods($controller, $this->after, $output);
    }
    
    private function runMethods($controller, array $when, $output)
    {
        if (! array_key_exists($output, $when)) {
            return;
        }

        foreach ($when[$output] as $method) {
            //$this->checkMethod($controller, $method);
            call_user_func(array($controller, $method));
        }
    }
    
    private function checkMethod($controller, $method)
    {
        if (! method_exists($controller, $method)) {
            throw new \RuntimeException(sprintf('Method does not exist ["%s::%s"]', get_class($controller), $method));
        }
    }
}
