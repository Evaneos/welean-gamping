<?php
namespace Gamping\Controllers\Search;

use Gamping\Controller;

class RegionsByCountry extends Controller
{
    /**
     * 
     * @var \Gamping\Service\GeographicalService
     */
    private $geographicalService;
    
    public function setGeographicalService($service)
    {
        $this->geographicalService = $service;
    }
    
    protected function executeAction()
    {
        $regions = array();
        $id = $this->getParam('id', 0);
        
        if ($id > 0) {
            $country = $this->geographicalService->getCountryById($id);
            $regions = $this->geographicalService->getRegionsByCountry($country);
        }
                
        $this->setData('regions', $regions);
    }
    
}