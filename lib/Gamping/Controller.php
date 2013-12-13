<?php
namespace Gamping;

use Symfony\Component\HttpFoundation\Request;

abstract class Controller
{

    private $request;

    protected abstract function executeAction();
    
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getAllParams()
    {
        $post = $this->request->request->all();
        $get = $this->request->query->all();
        $url = $this->request->attributes->get('_route_params');
        
        return array_merge($url, $get, $post);
    }
    
    public function getParam($name, $default = null)
    {
        if ($this->request->request->has($name)) {
            return $this->request->request->get($name);
        }
        
        if ($this->request->query->has($name)) {
            return $this->request->query->get($name);
        }
        
        $url = $this->request->attributes->get('_route_params');
        if (array_key_exists($name, $url)) {
            return $url[$name];
        }
        
        return $default;
    }
    
    public function execute()
    {
    	$data = $this->executeAction();
        
    	return $data;
    }
}