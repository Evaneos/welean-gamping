<?php
namespace Gamping\Controllers;

class Home extends \Gamping\Controller
{

    protected function executeAction()
    {
        $this->getAllParams();
        
        return array('data' => 'Hello World');
    }
}