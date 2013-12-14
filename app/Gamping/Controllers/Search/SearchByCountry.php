<?php
namespace Gamping\Controllers\Search;

use Gamping\Controller;
use Gamping\Service\ParcelFormService;
use Gamping\Model\Currency\Manager;

class SearchByCountry extends Controller
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
        $computername = $this->getParam('computername');

        $country = $this->countryManager->getByComputername($computername);
        $countries = $this->geographicalService->getAllCountries();

        $this->setData('country', $country);
        $this->setData('countries', $countries);
        $this->setData('bodyClass', 'search');
    }

}