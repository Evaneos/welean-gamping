<?php
namespace Gamping;

use Gamping\Response\Html;
use Gamping\Response\Json;
use Symfony\Component\HttpFoundation\Request;
use Gamping\Layout\Selector;

class ResponseSelector
{

    private $rootDirectory = '';
    
    private $outputs = array();
    
    private $layouts = array();
    
    private $scripts = array();
    
    private $layoutSelector;
    
    public function getRootDirectory()
    {
        return $this->rootDirectory;
    }
    
    public function setRootDirectory($rootDirectory)
    {
        $this->rootDirectory = $rootDirectory;
    }
    
    public function getLayoutSelector()
    {
        return $this->layoutSelector;
    }
    
    public function setLayoutSelector(Selector $selector)
    {
        $this->layoutSelector = $selector;
    }
    
    public function getResponse(Request $request)
    {
        $response = null;
        $outputName = $this->getOutputName($request);
        
        if ($outputName == 'html') {
            $response = new Html();
            $viewName = $this->outputs['html'];
        }
        
        if ($outputName == 'json') {
            $response = new Json();
            $viewName = $this->outputs['json'];
        }
        
        if ($outputName == 'xml') {
            $response = new Xml();
            $viewName = $this->outputs['xml'];
        }
        
        if ($response != null) {
            $layout = $this->layoutSelector->getLayout($this->layouts[$outputName]);
            
            if (is_array($this->scripts[$outputName])) {
                foreach ($this->scripts[$outputName] as $section => $scripts) {
                    foreach ($scripts as $script) {
                        $layout->addJavascriptFile($script, $section);
                    }
                } 
            }
            
            $response->setLayout($layout);
            if (trim($viewName) != '') {
                $response->setViewFile($this->rootDirectory . DIRECTORY_SEPARATOR . $viewName);
            }
        }
        
        return $response;
    }
    
    public function getOutputName(Request $request)
    {
        $acceptables = $request->getAcceptableContentTypes();
        
        foreach ($acceptables as $acceptable) {
            if ($this->isAcceptable($acceptable, 'text/html') && array_key_exists('html', $this->outputs)) {
                return 'html';
            }
        
            if ($this->isAcceptable($acceptable, 'application/json') && array_key_exists('json', $this->outputs)) {
                return 'json';
            }
        
            if (($this->isAcceptable($acceptable, 'text/xml') || $this->isAcceptable($acceptable, 'application/xml'))  
                && array_key_exists('xml', $this->outputs)) {
                return 'xml';
            }
        }
        
        throw new \RuntimeException('Unable to find a compatible output.');
    }
    
    private function isAcceptable($requested, $match)
    {
        if ($requested = '*/*') {
            return true;
        }
        
        return ($requested == $tested);
    }
    
    public function addOutput($name, $layout, $view, $scripts)
    {
        $this->layouts[$name] = $layout;
        $this->outputs[$name] = $view;
        $this->scripts[$name] = $scripts;
    }
}
