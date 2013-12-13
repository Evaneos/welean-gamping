<?php
namespace Gamping;

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

    public function setRouteFile($filename)
    {
        if (! file_exists($filename)) {
            throw new \RuntimeException(sprintf('Route file not found ["%s"]', $filename));
        }
        
        $this->routeFile = $filename;
    }

    public function run()
    {
        $this->registerRoutes();
        $this->app->run();
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
        $pattern = $this->extractValue($route, 'pattern');
        $controllerName = $this->extractValue($route, 'controller');
        $controller = $this->container->get($controllerName);
        
        $this->app->before(function (\Symfony\Component\HttpFoundation\Request $request) use($controller)
        {
            $controller->setRequest($request);
        });
        
        $to = function () use($controller)
        {
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
