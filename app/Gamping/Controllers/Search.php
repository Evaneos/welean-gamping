<?php
namespace Gamping\Controllers;

use Gamping\Controller;
use Gamping\Service\ParcelFormService;
use Gamping\Model\Currency\Manager;

class Search extends Controller
{

    /** @var \Gamping\Model\Country\Manager */
    public $countryManager = null;

    private $geographicalService;
    
    public function setGeographicalService($service)
    {
        $this->geographicalService = $service;
    }
    
    protected function executeAction()
    {
        $computername = $this->getParam('computername', 0);

        $countries = $this->geographicalService->getAllCountriesWithActiveParcel();

        if($computername > 0){
            $country = $this->countryManager->getByComputername($computername);
            $this->setData('country', $country);
        }


        $this->setData('countries', $countries);
        $this->setData('bodyClass', 'search');
    }
    
}