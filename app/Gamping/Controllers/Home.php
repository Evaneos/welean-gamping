<?php
namespace Gamping\Controllers;

class Home extends \Gamping\Controller
{
    public $userManager = null;

    protected function executeAction(array $data)
    {
        $this->getAllParams();

        // var_dump($this->userManager);
        var_dump($this->userManager->getById(2));

        return array('data' => 'Hello World');
    }
    
    public function afterRun(array $data)
    {
        return $data;
    }
}