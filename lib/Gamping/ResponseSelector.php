<?php
namespace Gamping;

use Gamping\Response\Html;
use Symfony\Component\HttpFoundation\Request;

class ResponseSelector
{

    private $outputs = array();
    
    public function getResponse(Request $request)
    {
        $view = null;
        $outputName = $this->getOutputName($request);
        
        if ($outputName == 'html') {
            $view = new Html();
            $viewName = $this->outputs['html'];
        }
        
        if ($outputName == 'json') {
            $view = new Json();
            $viewName = $this->outputs['json'];
        }
        
        if ($outputName == 'xml') {
            $view = new Xml();
            $viewName = $this->outputs['xml'];
        }
        
        if ($view != null) {
            $view->setViewFile($viewName);
        }
        
        return $view;
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
    
    public function addOutput($name, $view)
    {
        $this->outputs[$name] = $view;
    }
}