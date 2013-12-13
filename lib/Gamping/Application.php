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
     * @var Request
     */
    private $request = null;

    /**
     * Initialize a new instance.
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

    public function getRequest()
    {
        return $this->request;
    }
    
    public function setRequest(Request $request)
    {
        $this->request = $request;
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

    private function registerRoutes()
    {
        if (trim($this->routeFile) == '') {
            throw new \RuntimeException('Route file is not set.');
        }
        
        $data = $this->yaml->parse($this->routeFile);
        
        $routes = $data['routes'];
        
        foreach ($routes as $route) {
            $this->registerRoute($route);
        }
    }

    private function registerRoute(array $route)
    {
        $app = $this;
        $container = $this->container;
        $pattern = $app->extractValue($route, 'pattern');
        $controllerName = $app->extractValue($route, 'controller');
        
        $to = function () use($app, $container, $controllerName)
        {
            $controller = $container->get($controllerName);
            
            $controller->setResponseSelector(new ResponseSelector());
            $controller->setRequest($app->getRequest());
            
            return $controller->execute();
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

    private function extractValue(array $data, $path)
    {
        if (strpos($path, '.') !== false) {
            $parts = explode('.', $path, 1);
            
            $this->validateArrayKey($data, $parts[0]);
            return $this->extractValue($data[$parts[0]], $parts[1]);
        }
        
        $this->validateArrayKey($data, $path);
        
        return $data[$path];
    }

    private function validateArrayKey(array $data, $key)
    {
        if (! array_key_exists($key, $data)) {
            throw new \RuntimeException(sprintf('Invalid configuration : could not find required element [%s]', $key));
        }
    }
}
