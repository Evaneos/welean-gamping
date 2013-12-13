<?php
namespace Gamping;

use Symfony\Component\HttpFoundation\Request;

/**
 * Base controller for all application controllers.
 * @author thibaud
 *
 */
abstract class Controller
{

    /**
     * 
     * @var Request
     */
    private $request;

    protected abstract function executeAction();

    /**
     * Sets the request object.
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * Returns the current request object.
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Gets all request parameters from post, get, and url.
     * @return multitype:
     */
    public function getAllParams()
    {
        $post = $this->request->request->all();
        $get = $this->request->query->all();
        $url = $this->request->attributes->get('_route_params');
        
        return array_merge($url, $get, $post);
    }
    
    /**
     * Gets a param identified by its name (looking in post, get, and url in that order)
     * and returns its value or the default value if the param does not exist in the request.
     * @param string $name Name of the parameter.
     * @param mixed $default [opt] Default value to return if the parameter is not found. 
     * @return mixed|null
     */
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
    
    /**
     * Executes the controller action.
     * @return string Response output.
     */
    public function execute()
    {
    	return $this->executeAction();
    }
}