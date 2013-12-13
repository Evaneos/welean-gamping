<?php
namespace Gamping\Controllers;

class Home extends \Gamping\Controller
{
    public $userManager = null;
    
    /**
     * 
     * @var \Gamping\Model\Parcel\Manager
     */
    public $parcelManager = null;

    protected function executeAction(array $data)
    {
        $this->getAllParams();

        // var_dump($this->userManager);
        var_dump($this->userManager->getById(2));

        var_dump($this->parcelManager->getById(1));
        
        return array('data' => 'Hello World');
    }
    
    public function afterRun(array $data)
    {
        return $data;
    }
}