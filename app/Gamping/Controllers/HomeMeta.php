<?php
namespace Gamping\Controllers;

use Berthe\Interceptor\AbstractInterceptor;

class HomeMeta extends AbstractInterceptor
{
    
    public function intercept($method, $args)
    {
        $data = $this->invoke($method, $args);
        
        if (!array_key_exists('title', $data)) {
            $data['title'] = 'My title';
        }
    }
    
}
