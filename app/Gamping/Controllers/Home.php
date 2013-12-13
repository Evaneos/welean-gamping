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


        $fetcher = new \Berthe\Fetcher(-1, -1);
        $resultSet = $this->userManager->getByPaginator($fetcher)->getResultSet();
        var_dump($resultSet);

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