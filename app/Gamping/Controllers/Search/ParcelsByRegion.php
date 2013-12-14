<?php
namespace Gamping\Controllers\Search;

use Gamping\Controller;

class ParcelsByRegion extends Controller
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
        $parcelViews = array();
        $id = $this->getParam('id', 0);
        
        if ($id > 0) {
            $region = $this->geographicalService->getRegionById($id);
            $parcelViews = $this->geographicalService->getParcelTileViewsByRegion($region);
        }
        
        $this->setData('parcelViews', $parcelViews);
    }
    
}
