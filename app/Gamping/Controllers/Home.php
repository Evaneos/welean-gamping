<?php
namespace Gamping\Controllers;

class Home extends \Gamping\Controller
{
    public $userManager = null;
    public $countryManager = null;

    /**
     *
     * @var \Gamping\Model\Parcel\Manager
     */
    public $parcelManager = null;

    protected function executeAction()
    {
        $this->getAllParams();


        $countries = $this->countryManager->getAll();
        // foreach($countries as $country) {
        //     echo $country->getName() . '|' . $country->getName(false) . "<br />\n";
        //     var_dump($country);
        // }
        // die();
        //echo \t('chaud', 'en');

/*
        $fetcher = new \Berthe\Fetcher(-1, -1);
        $resultSet = $this->userManager->getByPaginator($fetcher)->getResultSet();
        /*var_dump($resultSet);

        // var_dump($this->userManager);
        var_dump($this->userManager->getById(2));

        return array('data' => 'Hello World');
*/

        $this->setData('data', 'Hello World');
        $this->setData('bodyClass', 'homepage');

    }

    public function afterRun()
    {
        $this->setData('title', 'Campez chez vos voisins !');
    }
}