<?php
namespace Gamping;

use Gamping\Response\Html;
use Symfony\Component\HttpFoundation\Request;

class ResponseSelector
{

    private $outputs = array();
    
    private $layouts = array();
    
    private $layoutSelector;
    
    public function getLayoutSelector()
    {
        return $this->layoutSelector;
    }
    
    public function setLayoutSelector(LayoutSelector $selector)
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
            $response->setLayout($this->layoutSelector->getLayout($this->layouts[$outputName]));
            $response->setViewFile($viewName);
        }
        
        return $response;
    }
    
    public function getOutputName(Request $request)
    {
        $acceptables = $request->getAcceptableContentTypes();
        
        foreach ($acceptables as $acceptable) {
            if ($acceptable == 'text/html' && array_key_exists('html', $this->outputs)) {
                return 'html';
            }
        
            if ($acceptable == 'application/json'  && array_key_exists('json', $this->outputs)) {
                return 'json';
            }
        
            if (($acceptable == 'text/xml' || $acceptable == 'application/xml')  && array_key_exists('xml', $this->outputs)) {
                return 'xml';
            }
        }
        
        throw new \RuntimeException('Unable to find a compatible output.');
    }
    
    public function addOutput($name, $layout, $view)
    {
        $this->layouts[$name] = $layout;
        $this->outputs[$name] = $view;
    }
}