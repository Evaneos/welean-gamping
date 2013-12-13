<?php
namespace Gamping;

use Symfony\Component\HttpFoundation\Request;
/**
 * Global application object providing dependency injection for controllers
 * @author thibaud
 *
 */
class Application
{

    /**
     *
     * @var \Silex\Application
     */
    private $app;

    /**
     *
     * @var \DICIT\Container
     */
    private $container;

    /**
     *
     * @var \Symfony\Component\Yaml\Yaml
     */
    private $yaml;

    /**
     *
     * @var string
     */
    private $routeFile = '';
    
    /**
     * 
     * @var array
     */
    private $data = null;
    
    /**
     * 
     * @var array
     */
    private $routeData;
        
    /**
     * 
     * @var LayoutSelector
     */
    private $layoutSelector;
    
    /**
     * 
     * @var Request
     */
    private $request = null;

    /**
     * Initialize a new instance.
     * 
     * @param \Silex\Application $application
     * @param \DICIT\Container $container
     * @param \Symfony\Component\Yaml\Yaml $yaml Yaml parser used for routes.
     */
    public function __construct(\Silex\Application $application,\DICIT\Container $container,\Symfony\Component\Yaml\Yaml $yaml)
    {
        $this->app = $application;
        $this->container = $container;
        $this->yaml = $yaml;
    }

    /**
     * Sets the file name that contains the route definitions.
     * @param string $filename
     * @throws \RuntimeException when $filename does not exist. 
     */
    public function setRouteFile($filename)
    {
        if (! file_exists($filename)) {
            throw new \RuntimeException(sprintf('Route file not found ["%s"]', $filename));
        }
        
        $this->routeFile = $filename;
    }

    /**
     * Returns the current request object
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getRequest()
    {
        return $this->request;
    }
    
    /**
     * Sets the current request object. This method has no effect if called after run().
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }
    
    public function getResponseSelector($routeName)
    {      
        $routeData = $this->getRouteData($routeName);
        $outputData = $this->extractValue($routeData, 'output', array());
        $selector = new ResponseSelector();
        
        foreach ($outputData as $name => $output) {
            $view = $this->extractValue($output, 'view', '');
            $layout = $this->extractValue($output, 'layout', '');
            
            $selector->addOutput($name, $layout, ROOT_DIR . DIRECTORY_SEPARATOR . $view); 
        }
        
        $selector->setLayoutSelector($this->getLayoutSelector($routeName));
        
        return $selector;
    }
    
    public function getLayoutSelector()
    {
        $this->loadData();
        $layoutSelector = new LayoutSelector();
        
        foreach ($this->data['layouts'] as $layout => $template) {
            $layoutSelector->addLayout($layout, ROOT_DIR . DIRECTORY_SEPARATOR . $template);
        }
        
        $layoutSelector->setDefaultLayout($this->data['default-layout']);
                
        return $layoutSelector;
    }
    
    public function getControllerHooks($routeName, $outputName)
    {
        $hooks = new ControllerHookCollection();
        $routeData = $this->getRouteData($routeName);
        $outputData = $this->extractValue($routeData, 'output', array());
        
        foreach ($outputData as $output => $data) {
            $before = $this->extractValue($data, 'before-run', array()) ?: array();
            $after = $this->extractValue($data, 'after-run', array()) ?: array();
            
            $hooks->setBeforeHooks($output, $before);
            $hooks->setAfterHooks($output, $after);
        }
            
        return $hooks;
    }
    
    /**
     * Registers all routes and runs the application.
     */
    public function run()
    {
        $this->registerRoutes();
        $this->setRequest(Request::createFromGlobals());
        
        $this->app->run($this->getRequest());
    }

    /**
     * Delegates all calls to underlying Silex application object
     * 
     * @param string $name            
     * @param array $args            
     * @return mixed
     */
    public function __call($name, $args)
    {
        return call_user_func_array(array($this->app, $name), $args);
    }

    private function getRouteData($routeName)
    {
        if (! array_key_exists($routeName, $this->routeData)) {
            throw new \RuntimeException(sprintf('Route does not exist [%s]', $routeName));
        }
        
        return $this->routeData[$routeName];
    }
    
    private function loadData()
    {
        if ($this->data === null) {
            if (trim($this->routeFile) == '') {
                throw new \RuntimeException('Route file is not set.');
            }
            
            $this->data = $this->yaml->parse($this->routeFile);
        }
    }
    
    private function registerRoutes()
    {
        $this->loadData();
        $routes = $this->data['routes'];
        
        foreach ($routes as $name => $route) {
            $this->registerRoute($name, $route);
        }
        
        $this->routeData = $routes;
    }

    private function registerRoute($routeName, array $route)
    {
        $app = $this;
        $container = $this->container;
        $pattern = $app->extractValue($route, 'pattern');
        $controllerName = $app->extractValue($route, 'controller');
        
        $to = function () use($app, $container, $routeName, $controllerName)
        {
            $request = $app->getRequest();
            
            $controller = $container->get($controllerName);
            $controller->setRequest($request);
            
            $responseSelector = $app->getResponseSelector($routeName);
            $outputName = $responseSelector->getOutputName($request);
            
            /* @var $hooks  \Gamping\ControllerHookCollection */
            $hooks = $app->getControllerHooks($routeName, $outputName);
            
            $hooks->runBefore($controller, $outputName);
            $controller->execute();
            $hooks->runAfter($controller, $outputName);
           
            $response = $responseSelector->getResponse($app->getRequest());
            
            return $response->render($controller->getDatas());
        };
        
        $methods = $this->extractValue($route, 'methods');
        foreach ($methods as $method) {
            $this->registerMethod($method, $pattern, $to);
        }
    }

    private function registerMethod($method, $pattern, $to)
    {
        if (in_array($method, array('get', 'post', 'put', 'delete'))) {
            $this->app->{$method}($pattern, $to);
        }
    }

    private function extractValue(array $data, $path, $default = null)
    {
        if (strpos($path, '.') !== false) {
            $parts = explode('.', $path, 1);
            
            if (! array_key_exists($parts[0], $data)) {
                return $default;
            }
            
            return $this->extractValue($data[$parts[0]], $parts[1]);
        }
        
        if (! array_key_exists($path, $data)) {
            return $default;
        }
        
        return $data[$path];
    }

    private function validateArrayKey(array $data, $key)
    {
        if (! array_key_exists($key, $data)) {
            throw new \RuntimeException(sprintf('Invalid configuration : could not find required element [%s]', $key));
        }
    }
}
