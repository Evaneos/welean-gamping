<?php
namespace Gamping\Controllers;

use Gamping\Controller;
use Gamping\Service\ParcelFormService;
use Gamping\Model\Currency\Manager;

class Search extends Controller
{

    private $geographicalService;
    
    public function setGeographicalService($service)
    {
        $this->geographicalService = $service;
    }
    
    protected function executeAction()
    {        
        $countries = $this->geographicalService->getAllCountries();
        
        $this->setData('countries', $countries);
        $this->setData('bodyClass', 'search');
    }
    
}