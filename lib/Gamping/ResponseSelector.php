<?php
namespace Gamping;

use Gamping\Response\Html;
use Symfony\Component\HttpFoundation\Request;

class ResponseSelector
{

    private $outputs = array();
    
    public function getResponse(Request $request)
    {
        $acceptables = $request->getAcceptableContentTypes();
        $view = null;
        
        foreach ($acceptables as $acceptable) {
            if ($acceptable == 'text/html' && array_key_exists('html', $this->outputs)) {
                $view = new Html();
                $viewName = $this->outputs['html'];
            }
            
            if ($acceptable == 'application/json'  && array_key_exists('json', $this->outputs)) {
                $view = new Json();
                $viewName = $this->outputs['json'];
            }
            
            if (($acceptable == 'text/xml' || $acceptable == 'application/xml')  && array_key_exists('xml', $this->outputs)) {
                $view = new Xml();
                $viewName = $this->outputs['xml'];
            }
            
            if ($view != null) {
                $view->setViewFile($viewName);
                break;
            }
        }
        
        return $view;
    }
    
    public function addOutput($name, $view)
    {
        $this->outputs[$name] = $view;
    }
}