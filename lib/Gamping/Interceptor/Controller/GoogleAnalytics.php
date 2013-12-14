<?php

namespace Gamping\Interceptor\Controller;

class GoogleAnalytics extends \Berthe\Interceptor\AbstractInterceptor
{
    private $googleAnalyticsKey = '';
    
    public function setKey($key)
    {
        $this->googleAnalyticsKey = $key;
    }
    
    function intercept($method, $args)
    {
        $result = $this->invoke($method, $args);
        
        if ($method === 'execute') {
            $this->decorated->setData('googleAnalytics', $this->googleAnalyticsKey);
        }
        
        return $result;
    }
}