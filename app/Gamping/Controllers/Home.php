<?php
namespace Gamping\Controllers;

class Home extends \Gamping\Controller
{
    public $userManager = null;

    protected function executeAction(array $data)
    {
        $this->getAllParams();


        $fetcher = new \Berthe\Fetcher(-1, -1);
        $resultSet = $this->userManager->getByPaginator($fetcher)->getResultSet();
        var_dump($resultSet);

        // var_dump($this->userManager);
        var_dump($this->userManager->getById(2));

        return array('data' => 'Hello World');
    }

    public function afterRun(array $data)
    {
        return $data;
    }
}